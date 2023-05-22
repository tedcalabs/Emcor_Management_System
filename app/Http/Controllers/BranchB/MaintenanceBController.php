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

    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $query = Maintenance::where([
            ["branch", "=", 2],
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

        return view('branchb.secretary.maintenanceRequest.index', compact('data'));
    }

    public function ViewData($id)
{
    $data = Maintenance::select("*")
    ->where([
        ["branch", "=", 2],
        ["category", "=", "Whitelines"]
    ])
    
    ->take(5)->find($id);
    return view('branchb.secretary.maintenanceRequest.show', compact('data'));
}

    public function acceptd(Request $request)
    {
        $search = $request->input('search');
    
        $data = Maintenance::select("*")
            ->where([
                ["branch", "=", 2],
                ["acceptd", "=", 1]
            ]);
    
        if ($search) {
            $data->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        }
    
        $data = $data->paginate(4);
        return view('branchb.secretary.maintenanceRequest.accepted', compact('data'));
    }


    public function updateReq($id)
    {
        
        $technician  = BayawanUser::select("*")
        ->where([
            ["role", "=", 3],
            ["status", "=", 1],
            ["sched_status", "=", "available"],
        ])
        ->get();
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.secretary.maintenanceRequest.edit', compact('data', 'technician'));
    }

    public function create()
    {
        //
    }
   
    public function upReqB($id)
    {
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.secretary.maintenanceRequest.update', compact('data'));
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

    // public function edit(Maintenance $maintenance)
    // {
    //     $maintenance = Maintenance::where('branch', 2)->take(5)->get();
    //     return view('branchb.maintenance_request.edit', compact('maintenance'));
    // }

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
            return redirect()->route('acceptb')
            ->with('success','Request accepted!');
       
    }

     public function deleteReq($id)
     {
        $data = Maintenance::where('branch', 2)->findOrFail($id);
         $data->delete();
         return back();
     }


  
     public function updateMechReq($id)
     {
 
         $technician = BayawanUser::select("*")
             ->where([
                 ["role", "=", 5],
                 ["status", "=", 1],
                 ["sched_status", "=", "available"],
             ])
             ->get();
         $data = Maintenance::where('branch', 2)->take(5)->find($id);
         return view('branchb.secretary.maintenanceRequest.mechanic.edit', compact('data', 'technician'));
     }   
     public function getMechanic(Request $request)
     {
 
         $search = $request->input('search');
         $query = Maintenance::where([
                 ["branch", "=", 2],
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
 
 
         return view('branchb.secretary.maintenanceRequest.mechanic.index', compact('data'));
     }

     
    public function ViewDataML($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["category", "=", "Mechanic"]
        ])
        
        ->take(5)->find($id);
        return view('branchb.secretary.maintenanceRequest.mechanic.show', compact('data'));
    }
    
 
     public function updateXB(Request $request, $id)
     {
         $request->validate([
             'name' => 'required',
             'address' => 'required',
             'phone' => 'required',
             'description' => 'required',
             'req_date' => 'required',
         ]);
 
         $data = Maintenance::find($id);
         $data->name = $request->name;
         $data->phone = $request->phone;
         $data->address = $request->address;
         $data->description = $request->description;
         $data->req_date = $request->req_date;
         $data->technician = $request->technician;
         $data->save();
         return redirect()->route('mreqb')
             ->with('success', 'Request Updated');
     }

    
     public function getBrownlines(Request $request)
     {
 
 
         $search = $request->input('search');
 
         $query = Maintenance::where([
                 ["branch", "=", 2],
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
 
         return view('branchb.secretary.maintenanceRequest.brownlines.index', compact('data'));
     }

     public function ViewDataBL($id)
     {
         $data = Maintenance::select("*")
         ->where([
             ["branch", "=", 2],
             ["category", "=", "Brownlines"]
         ])
         
         ->take(5)->find($id);
         return view('branchb.secretary.maintenanceRequest.brownlines.show', compact('data'));
     }


     public function updateBrownReq($id)
     {
 
         
        $technician  = BayawanUser::select("*")
             ->where([
                 ["role", "=", 4],
                 ["status", "=", 1],
                 ["sched_status", "=", "available"],
             ])
             ->get();
         $data = Maintenance::where('branch', 2)->take(5)->find($id);
         return view('branchb.secretary.maintenanceRequest.brownlines.editbrown', compact('data', 'technician'));
     }
}
