<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RepairController extends Controller
{

    public function getMaintenanceByUserDeviceToken(Request $request)
    {
        $user = Auth::user();

    // Retrieve the maintenance tasks associated with the user as a technician
    $requests = $user->requests;

    foreach ($requests as $request) {
        // Modify task properties if needed
        $request['description'] = strip_tags($request['description']);
        $request['description'] = preg_replace("/&#?[a-z0-9]+;/i", " ", $request['description']);
    }

    $data = [
        'total_size' => $requests->count(),
        'category_id' => 9,
        'offset' => 0,
        'repairs' => $requests
    ];

    return response()->json($data, 200);
    }

    public function ViewRepair($id)
    {
        $user = Auth::user();
        $deviceToken = $user->device_token;

        $results  = Maintenance::select("*")
            ->where('device_token', $deviceToken)

            ->take(5)->find($id);
        foreach ($results as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $results->count(),
            'category_id' => 9,
            'offset' => 0,
            'repairs' => $results
        ];

        return response()->json($data, 200);
    }

    public function upload(Request $request)
    {
        $dir = "test/";
        $image = $request->file('image');

        if ($request->has('image')) {
            $imageName = \Carbon\Carbon::now()->toDateString . "-" . uniqid() . "." . "png";
            if (!Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }
            Storage::disk('public')->put($dir . $imageName, file_get_contents($image));
        } else {
            return response()->json(['message' => trans('/storage/test/' . 'def.png')], 200);
        }

        $userDetails = [
            'image' => $imageName,
        ];

        // User::where(['id'=> 27])->update($userDetails);

        return response()->json(['message' => trans('/storage/test/' . $imageName)], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reference_no' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for the image
        ]);

        try {
            $data = Maintenance::find($id);

            if (!$data) {
                return response()->json(['error' => 'Maintenance data not found'], Response::HTTP_NOT_FOUND);
            }

            $data->reference_no = $request->reference_no;

            if ($request->hasFile('image')) {
          
                $destination = 'uploads/proof/'. $data->image;
    
                if(File::exists($destination)){
                    File::delete($destination);
                }
    
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/proof/', $filename);
                $data->image = $filename;
            }
            $data->save();

            return response()->json(['message' => 'Maintenance data updated successfully'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update maintenance data'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }



//     public function update(Request $request, $id)
// {
//     $request->validate([
//         'reference_no' => 'required',
//     ]);

//     try {
//         $data = Maintenance::find($id);

//         if (!$data) {
//             return response()->json(['error' => 'Maintenance data not found'], Response::HTTP_NOT_FOUND);
//         }

//         $data->reference_no = $request->reference_no;
//         $data->save();

//         return response()->json(['message' => 'Maintenance data updated successfully'], Response::HTTP_OK);
//     } catch (\Exception $e) {
//         return response()->json(['error' => 'Failed to update maintenance data'], Response::HTTP_INTERNAL_SERVER_ERROR);
//     }
// }

}
