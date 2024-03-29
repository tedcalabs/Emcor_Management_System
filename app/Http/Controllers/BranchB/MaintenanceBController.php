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
        $keyword = $request->input('search');
    
        $query = Maintenance::select("maintenances.*", "bayawan_users.fname as technician_fname", "bayawan_users.lname as technician_lname")
            ->leftJoin('bayawan_users', 'maintenances.technicianb_id', '=', 'bayawan_users.id')
            ->where([
                ["maintenances.branch", "=", 2],
                ["maintenances.acceptd", "=", 0],
                ["maintenances.category", "=", "Whitelines"]
            ]);
        
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('bayawan_users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('bayawan_users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $query->paginate(10);

        return view('branchb.secretary.maintenanceRequest.index', compact('data','keyword'));
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
    
        $data = $data->paginate(10);
        return view('branchb.secretary.maintenanceRequest.accepted', compact('data'));
    }


    public function updateReq($id)
    {
        
        $technician = $this->getAvailableWhitelinesTech();
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

 

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'req_date' => 'required',
            'task_due_date' => 'required',
            'acceptd' => 'required',
            'status' => 'required',
            'technicianb_id' => 'required|exists:bayawan_users,id',
        ]);
    
        $technician = BayawanUser::findOrFail($validatedData['technicianb_id']);
    
        $data = Maintenance::findOrFail($id);
        $data->name = $validatedData['name'];
        $data->phone = $validatedData['phone'];
        $data->address = $validatedData['address'];
        $data->description = $validatedData['description'];
        $data->req_date = $validatedData['req_date'];
        $data->acceptd = $validatedData['acceptd'];
        $data->task_due_date = $validatedData['task_due_date'];
        $data->status = $validatedData['status'];
        $data->technicianb_id = $technician->id;
        $data->save();

        $makeAvailable = $request->input('make_available', 0);
    
        if ($makeAvailable == 1) {
            // Set the technician as available
            $technician->update([
                'available' => true,
                // Update any other relevant fields
            ]);
        } else {
            // Set the technician as unavailable
            $technician->update([
                'available' => false,
                // Update any other relevant fields
            ]);
        }
            return redirect()->route('acceptb')
            ->with('success','Request accepted!');
       
    }

     public function deleteReq($id)
     {
        $data = Maintenance::where('branch', 2)->findOrFail($id);
         $data->delete();
         return back();
     }


     public function getAvailableMechanic()
     {
         $availableTechnicians = BayawanUser::where('available', true)
         ->where('role', 5)
         ->get();
     
     return $availableTechnicians;
     }
     
  
     public function getAvailableWhitelinesTech()
     {
         $availableTechnicians = BayawanUser::where('available', true)
         ->where('role', 3)
         ->get();
     
         return $availableTechnicians;
     }
     
     public function getAvailableBrownlinesTech()
     {
         $availableTechnicians = BayawanUser::where('available', true)
         ->where('role', 4)
         ->get();
     
         return $availableTechnicians;
     }

  
     public function updateMechReq($id)
     {
        $technician = $this->getAvailableMechanic();
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
     
         $data = $query->paginate(10);
 
 
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
         
             $data = $query->paginate(10);
 
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
 
      
        $technician = $this->getAvailableBrownlinesTech();
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
         return view('branchb.secretary.maintenanceRequest.brownlines.editbrown', compact('data', 'technician'));
     }

     

    public function decline($id)
    {
        $data = Maintenance::where('branch', 2)->findOrFail($id);
        return view('branchb.secretary.maintenanceRequest.decline', compact('data'));
    }


    
    
    public function declineRequest(Request $request, $id)
    {
        $request->validate([

            'status' => 'required',
            'message' => 'required',
            'acceptd' => 'required',
        ]);


        $data = Maintenance::find($id);
     
        $data->status = $request->status;
        $data->message = $request->message;
        $data->acceptd = $request->acceptd;
        $data->save();
        return redirect()->route('bdeclined.list')
            ->with('success', 'Request successfully declined!');
    }


        
    public function getDeclinedRequest()
    {


        $data = Maintenance::select("*")
            ->where([
                ["branch", "=", 2],
                ["acceptd", "=", 2]
            ])
            ->paginate(10);
        return view('branchb.secretary.maintenanceRequest.declinedList', compact('data'));
    }
}
