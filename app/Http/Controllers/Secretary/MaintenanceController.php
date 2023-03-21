<?php

namespace App\Http\Controllers\Secretary;

use Exception;
use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\MrRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;



class MaintenanceController extends Controller
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
            ["branch", "=", 1],
            ["tech", "=", 2]
        ])
        ->get();

//dd($users);


      //  $data = Maintenance::where('branch',1)->take(5)->get();
       return view('dumaguete.maintenance_request.index', compact('data'));
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept()
    {
    
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["tech", "=", 5]
        ])
        ->get();
        return view('dumaguete.maintenance_request.accept', compact('data'));
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $maintenance = Maintenance::where('branch', 1)->take(5)->get();
        return view('dumaguete.maintenance_request.edit', compact('maintenance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
            return redirect()->route('mreq')
            ->with('success','Request accepted!');
       
    }


}
