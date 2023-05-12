<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    // public function getMaintenanceByDeviceToken(Request $request)
    // {
    //     $deviceToken = $request->input('device_token');
    
    //     $results = DB::table('maintenances')
    //         ->join('users', 'maintenances.device_token', '=', 'users.device_token')
    //         ->where('users.device_token', '=', $deviceToken)
    //         ->select('maintenances.*')
    //         ->get();
 
    //     $data =  [
    //         'total_size' => $results->count(),
    //         'category_id' => 9,
    //         'offset' => 0,
    //         'products' => $results
    //     ];

    //     return response()->json($data, 200);
    // } 
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
    

// public function getMaintenanceByDeviceToken(Request $request)
// {
//     $user = User::findOrFail($request->user_id); // Assuming you have a 'user_id' field in the request

//     $deviceToken = $user->device_token;

//     $results = Maintenance::with('user')
//         ->whereHas('user', function ($query) use ($deviceToken) {
//             $query->where('device_token', $deviceToken);
//         })
//         ->get();

//     $count = $results->count();

//     return response()->json([
//         'count' => $count,
//         'data' => $results,
//     ]);
// }


//     public function getMaintenanceByDeviceToken(Request $request)
// {
//     $deviceToken = $request->input('device_token');

//     $results = Maintenance::with('user')
//         ->whereHas('user', function ($query) use ($deviceToken) {
//             $query->where('device_token', $deviceToken);
//         })
//         ->get();




//         $data =  [
//             'total_size' => $results->count(),
//             'category_id' => 9,
//             'offset' => 0,
//             'products' => $results
//         ];

//         return response()->json($data, 200);
//     }

  
}

