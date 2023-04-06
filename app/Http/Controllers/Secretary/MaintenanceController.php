<?php

namespace App\Http\Controllers\Secretary;

use Exception;
use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\MrRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;



class MaintenanceController extends Controller
{


    public function index()
    {
       

        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 0],
            ["category", "=", "Whitelines"]
        ])
        ->get();


       return view('dumaguete.maintenance_request.index', compact('data'));
    }
    public function getBrownlines()
    {
     


        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 0],
            ["category", "=", "Brownlines"]
        ])
        ->get();

       return view('dumaguete.maintenance_request.brownlines.index', compact('data'));
    }

    public function getMechanic()
    {
    

        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 0],
            ["category", "=", "Mechanic"]
        ])
        ->get();


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
        ]);

        if ($saveData) {
            return response([
                'message' => 'success',
                'mrequest' => new MreqResource($saveData)
            ], 200);
        } else {
            return response([
                'message' => 'error',

            ], 500);
        }
    }


   
    public function accept()
    {
    
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1]
        ])
        ->get();
        return view('dumaguete.maintenance_request.accept', compact('data'));
    }
    

    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
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


    
    public function upReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.update', compact('data'));
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
            return redirect()->route('accept')
            ->with('success','Request accepted!');
       
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
            ->with('success','Request Updated');
       
    }


}
