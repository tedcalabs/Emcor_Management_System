<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RepairController extends Controller
{

    public function getMaintenanceByUserDeviceToken(Request $request)
    {
        $user = Auth::user();
        $deviceToken = $user->device_token;
    
        $results = Maintenance::where('device_token', $deviceToken)
            ->get();
    
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
        $imageName = \Carbon\Carbon::now()->toDateString. "-" .uniqid() . "." . "png";
        if(!Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
        
        }
        Storage::disk('public')->put($dir.$imageName, file_get_contents($image));

    }else{
        return response()->json(['message' => trans('/storage/test/'.'def.png')], 200);
    }

    $userDetails = [
        'image' => $imageName,
    ];
  
 // User::where(['id'=> 27])->update($userDetails);

  return response()->json(['message' => trans('/storage/test/'.$imageName)], 200);
  }
}

