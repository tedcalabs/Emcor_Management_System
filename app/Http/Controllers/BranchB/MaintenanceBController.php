<?php

namespace App\Http\Controllers\BranchB;


use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\MrRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;
use App\Models\BayawanUser;

class MaintenanceBController extends Controller
{

    public function index()
    {
      

        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 2]
        ])
        ->get();

        return view('branchb.secretary.maintenanceRequest.index', compact('data'));
    }

    public function acceptd()
    {
    
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 5]
        ])
        ->get();
        return view('branchb.secretary.maintenanceRequest.accepted', compact('data'));
    }


    public function updateReq($id)
    {
        
        $acceptnician = BayawanUser::select("*")
        ->where([
            ["role", "=", 3],
            ["status", "=", 1],
            ["sched_status", "=", "available"],
        ])
        ->get();
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.secretary.maintenanceRequest.acceptd', compact('data', 'acceptnician'));
    }

    public function create()
    {
        //
    }
   
    public function upReq($id)
    {
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('dumaguete.maintenance_request.update', compact('data'));
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

    public function show($id)
    {
        //
    }

    public function edit(Maintenance $maintenance)
    {
        $maintenance = Maintenance::where('branch', 2)->take(5)->get();
        return view('dumaguete.maintenance_request.edit', compact('maintenance'));
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
            $data->acceptnician = $request->acceptnician;
            $data->save();
            return redirect()->route('mreqb')
            ->with('success','Request accepted!');
       
    }

     public function deleteReq($id)
     {
         $data = Maintenance::where('branch',2)->take(5)->find($id);
         $data->delete();
         return back();
     }
}
