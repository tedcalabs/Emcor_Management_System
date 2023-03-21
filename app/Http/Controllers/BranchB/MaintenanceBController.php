<?php

namespace App\Http\Controllers\BranchB;


use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\MrRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;
use App\Models\Bsecretary;

class MaintenanceBController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $mreqs = Maintenance::latest()->get();

        return response([
            'message' => 'success',
            'todos' =>   MreqResource::collection($mreqs),
        ], 200);
        */


        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["tech", "=", 2]
        ])
        ->get();
   // $data = Maintenance::where('branch', 2)->take(5)->get();
        return view('branchb.secretary.maintenanceRequest.index', compact('data'));
    }

    public function accept()
    {
    
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["tech", "=", 5]
        ])
        ->get();
        return view('branchb.secretary.maintenanceRequest.accepted', compact('data'));
    }


    public function updateReq($id)
    {
        
        $technician = Bsecretary::select("*")
        ->where([
            ["role", "=", 3],
            ["status", "=", 1],
            ["sched_status", "=", "available"],
        ])
        ->get();
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.secretary.maintenanceRequest.accept', compact('data', 'technician'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   
    public function upReq($id)
    {
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('dumaguete.maintenance_request.update', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MrRequest $mrRequest)
    {

        $mrRequest->validated();

        $saveData = Maintenance::create([
            'name' => $mrRequest->name,
            'address' => $mrRequest->address,
            'phone' => $mrRequest->phone,
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $maintenance = Maintenance::where('branch', 2)->take(5)->get();
        return view('dumaguete.maintenance_request.edit', compact('maintenance'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'req_date' => 'required',            
            'tech' => 'required',
            
            ]);


            $data = Maintenance::find($id);
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->description = $request->description;
            $data->req_date = $request->req_date;
            $data->tech = $request->tech;
            $data->technician = $request->technician;
            $data->save();
            return redirect()->route('mreqb')
            ->with('success','Request accepted!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
     public function deleteReq($id)
     {
         $data = Maintenance::where('branch',2)->take(5)->find($id);
         $data->delete();
         return back();
     }
}
