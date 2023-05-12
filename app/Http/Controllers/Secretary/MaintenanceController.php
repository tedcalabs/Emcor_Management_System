<?php

namespace App\Http\Controllers\Secretary;

use App\CentralLogic\Helpers;
use Exception;
use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\MrRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;



class MaintenanceController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Maintenance::where([
            ["branch", "=", 1],
            ["acceptd", "=", 0],
            ["category", "=", "Whitelines"]
        ]);
    
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
                 
                // Add more "orWhere" clauses for additional fields to be searched
            });
        }
    
        $data = $query->paginate(4);
    
        return view('dumaguete.maintenance_request.index', compact('data'));
    }
    
    public function getBrownlines(Request $request)
    {


        $search = $request->input('search');

        $query = Maintenance::where([
                ["branch", "=", 1],
                ["acceptd", "=", 0],
                ["category", "=", "Brownlines"]
            ]);
            if (!empty($search)) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                      ->orWhere('description', 'LIKE', '%' . $search . '%');
                     
                    // Add more "orWhere" clauses for additional fields to be searched
                });
            }
        
            $data = $query->paginate(4);

        return view('dumaguete.maintenance_request.brownlines.index', compact('data'));
    }

    public function getMechanic(Request $request)
    {

        $search = $request->input('search');
        $query = Maintenance::where([
                ["branch", "=", 1],
                ["acceptd", "=", 0],
                ["category", "=", "Mechanic"]
        ]);
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('description', 'LIKE', '%' . $search . '%');
                 
                // Add more "orWhere" clauses for additional fields to be searched
            });
        }
    
        $data = $query->paginate(4);


        return view('dumaguete.maintenance_request.mechanic.index', compact('data'));
    }



    public function store(MrRequest $mrRequest)
    {

        $mrRequest->validated();

        $saveData = Maintenance::create([
            'name' => $mrRequest->name,
            'address' => $mrRequest->address,
            'phone' => $mrRequest->phone,
            'branch' => $mrRequest->branch,
            'description' => $mrRequest->description,
            'category' => $mrRequest->category,
            'acceptd' => $mrRequest->acceptd,
            'device_token' => $mrRequest->device_token,
        ]);
        // $user = $mrRequest->user();

        if ($saveData) {


            return response([
                'message' => 'Request successfully sent',
                'mrequest' => new MreqResource($saveData)
            ], 200);
        } else {
            return response([
                'message' => 'Request not successful',

            ], 500);
        }

        $token = "dfzWcwakRGqn6DA-4CZsUK:APA91bGKRvGB-3KqzDKJuWmHk_IyEOHg7oeiqROrfYWbXrj2GYtJZ-kfw_CWdcE0CA9fu8z2cqFHDVd-flAJ0X2cGCuxH4UgPV-u-Y_6xZgAEpMg3n9KR8lNPAzfsT2FVjQrTff0x2Gb";
        Helpers::send_maintenance_notification($saveData, $token);
    }


    public function accept(Request $request)
    {
        $search = $request->input('search');
    
        $data = Maintenance::select("*")
            ->where([
                ["branch", "=", 1],
                ["acceptd", "=", 1]
            ]);
    
        if ($search) {
            $data->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }
    
        $data = $data->paginate(4);
    
        return view('dumaguete.maintenance_request.accept', compact('data', 'search'));
    }
    
    public function getDeclinedRequest()
    {


        $data = Maintenance::select("*")
            ->where([
                ["branch", "=", 1],
                ["acceptd", "=", 2]
            ])
            ->get();
        return view('dumaguete.maintenance_request.declinedList', compact('data'));
    }

    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        $data->delete();
        return back();
    }





    public function updateReq($id)
    {

        $technician = User::select("*")
            ->where([
                ["role", "=", 3],
                ["status", "=", 1],
                ["sched_status", "=", "available"],
            ])
            ->get();
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.edit', compact('data', 'technician'));
    }


    public function updateBrownReq($id)
    {

        $technician = User::select("*")
            ->where([
                ["role", "=", 5],
                ["status", "=", 1],
                ["sched_status", "=", "available"],
            ])
            ->get();
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.editbrown', compact('data', 'technician'));
    }

    public function updateMechReq($id)
    {

        $technician = User::select("*")
            ->where([
                ["role", "=", 4],
                ["status", "=", 1],
                ["sched_status", "=", "available"],
            ])
            ->get();
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.mechanic.edit', compact('data', 'technician'));
    }


    public function upReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.update', compact('data'));
    }


    public function decline($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.decline', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'req_date' => 'required',
            'acceptd' => 'required',
            'status' => 'required',
        ]);


        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->req_date = $request->req_date;
        $data->acceptd = $request->acceptd;
        $data->status = $request->status;
        $data->technician = $request->technician;
        $data->save();
        return redirect()->route('accept')
            ->with('success', 'Request accepted!');
    }

    public function declineRequest(Request $request, $id)
    {
        $request->validate([

            'status' => 'required',
            'message' => 'required',
            'acceptd' => 'required',
        ]);


        $data = Maintenance::find($id);
        $data->message = $request->message;
        $data->status = $request->status;
        $data->acceptd = $request->acceptd;
        $data->save();
        return redirect()->route('declined.list')
            ->with('success', 'Request successfully declined!');
    }

    public function updateX(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'req_date' => 'required',
            'acceptd' => 'required',
        ]);

        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->req_date = $request->req_date;
        $data->acceptd = $request->acceptd;
        $data->technician = $request->technician;
        $data->save();
        return redirect()->route('mreq')
            ->with('success', 'Request Updated');
    }
}
