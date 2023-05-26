<?php

namespace App\Http\Controllers\Secretary;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\CentralLogic\Helpers;
use App\Http\Requests\MrRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\MreqResource;



class MaintenanceController extends Controller
{


    public function index(Request $request)
    {
        $keyword = $request->input('search');
    
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 1],
                ["maintenances.acceptd", "=", 0],
                ["maintenances.category", "=", "Whitelines"]
            ]);
        
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $query->paginate(10);
    
        return view('dumaguete.maintenance_request.index', compact('data','keyword'));
    }

    public function ViewData($id)
{
    $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
    ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
    ->where([
        ["maintenances.branch", "=", 1],
        ["maintenances.category", "=", "Whitelines"]
    ])
    
    ->take(5)->find($id);
    return view('dumaguete.maintenance_request.show', compact('data'));
}

    
    public function getBrownlines(Request $request)
    {
        $keyword = $request->input('search');
    
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 1],
                ["maintenances.acceptd", "=", 0],
                ["maintenances.category", "=", "Brownlines"]
            ]);
        
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $query->paginate(10);
    
        return view('dumaguete.maintenance_request.brownlines.index', compact('data'));
    }

    public function ViewDataBL($id)
{
    $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
    ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
    ->where([
        ["maintenances.branch", "=", 1],
        ["maintenances.category", "=", "Brownlines"]
    ])
    
    ->take(5)->find($id);
    return view('dumaguete.maintenance_request.brownlines.show', compact('data'));
}



    public function getMechanic(Request $request)
    {

        $keyword = $request->input('search');
    
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 1],
                ["maintenances.acceptd", "=", 0],
                ["maintenances.category", "=", "Mechanic"]
            ]);
        
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $query->paginate(10);

        return view('dumaguete.maintenance_request.mechanic.index', compact('data'));
    }

    public function ViewDataML($id)
{
    $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
    ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
    ->where([
        ["maintenances.branch", "=", 1],
        ["maintenances.category", "=", "Mechanic"]
    ])
    
    ->take(5)->find($id);
    return view('dumaguete.maintenance_request.mechanic.show', compact('data'));
}

public function store(MrRequest $mrRequest)
{
    $mrRequest->validated();

    $user = $mrRequest->user(); // Get the authenticated user

    // Create the maintenance record and associate it with the technician
    $saveData = $user->requests()->create([
        'name' => $mrRequest->name,
        'house_no' => $mrRequest->house_no,
        'purok' => $mrRequest->purok,
        'barangay' => $mrRequest->barangay,
        'city_m' => $mrRequest->city_m,
        'address' => $mrRequest->address,
        'phone' => $mrRequest->phone,
        'branch' => $mrRequest->branch,
        'description' => $mrRequest->description,
        'category' => $mrRequest->category,
        'acceptd' => $mrRequest->acceptd,
        'w_stat' => $mrRequest->w_stat,
        'device_token' => $mrRequest->device_token,
    ]);

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
}



    public function accept(Request $request)
    {
        $keyword = $request->input('search');
    
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 1],
                ["maintenances.acceptd", "=", 1],
           
            ]);
        
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $query->paginate(10);
    
    
        return view('dumaguete.maintenance_request.accept', compact('data', 'keyword'));
    }
    
    public function getDeclinedRequest()
    {


        $data = Maintenance::select("*")
            ->where([
                ["branch", "=", 1],
                ["acceptd", "=", 2]
            ])
            ->paginate(7);
        return view('dumaguete.maintenance_request.declinedList', compact('data'));
    }

    public function ViewDataDC($id)
{
    $data = Maintenance::select("*")
    ->where([
        ["branch", "=", 1],
        ["acceptd", "=", 2]
    ])
    
    ->take(5)->find($id);
    return view('dumaguete.maintenance_request.showdec', compact('data'));
}

public function ViewDataAC($id)
{

    
    $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
    ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
    ->where([
        ["maintenances.branch", "=", 1],
    ])->find($id);
        
   
    return view('dumaguete.maintenance_request.showaceted', compact('data'));
}


    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        $data->delete();
        return back();
    }

    public function deleteReqAc($id)
    {
        $data = Maintenance::where('branch', 1)
        ->where('acceptd', 1) 
        ->findOrFail($id);
        $data->delete();
        return back();
    }

    
    public function updateReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
    
        $dueDate = $data->task_due_date; // Get the task due date from the $data object
    
        // Retrieve the start time from the "maintenances" table
        $startTime = $data->req_date;
    
        // Set the current date/time to the start time from the "maintenances" table
        $currentDateTime = Carbon::parse($startTime);
    
        $dueDateTime = Carbon::parse($dueDate);
        $duration = $dueDateTime->diffInMinutes($currentDateTime);
    
        $technicians = $this->getAvailableWhitelinesTech($dueDate, $duration);
        return view('dumaguete.maintenance_request.edit', compact('data','technicians'));
    }


    public function updateBrownReq($id)
    {
        //$technicians = User::where('role', 3)->get();
        $technician = User::select("*")
            ->where([
                ["role", "=", 5],
                ["status", "=", 1],
                //["sched_status", "=", "available"],
            ])
            ->get();
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.editbrown', compact('data', 'technician'));
    }


    public function getAvailableMechanic($dueDate, $duration)
    {
        $availableTechnicians = User::where('available', true)
        ->where('role', 4)
            ->whereDoesntHave('tasks', function ($query) use ($dueDate, $duration) {
                $endTime = Carbon::parse($dueDate)->addMinutes($duration);
    
                $query->where(function ($query) use ($dueDate, $endTime) {
                    $query->whereDate('task_due_date', '=', $dueDate)
                          ->where('req_date', '<=', $endTime);
                })->orWhere(function ($query) use ($endTime) {
                    $query->where('task_due_date', '>=', $endTime);
                });
            })
            ->get();
    
        return $availableTechnicians;
    }
    
public function getAvailableWhitelinesTech($dueDate, $duration)
{
    $endTime = Carbon::parse($dueDate)->addMinutes($duration);

    $availableTechnicians = User::where('available', true)
        ->where('role', 3)
        ->whereDoesntHave('tasks', function ($query) use ($dueDate, $endTime) {
            $query->where(function ($query) use ($dueDate, $endTime) {
                $query->whereDate('task_due_date', '=', $dueDate)
                    ->where('req_date', '<=', $endTime);
            })
            ->orWhere(function ($query) use ($endTime) {
                $query->where('task_due_date', '<=', $endTime);
            });
        })
        ->get();

    return $availableTechnicians;
}

    
    
    
    
    public function updateMechReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
    
        $dueDate = $data->task_due_date; // Get the task due date from the $data object
    
        // Retrieve the start time from the "maintenances" table
        $startTime = $data->req_date;
    
        // Set the current date/time to the start time from the "maintenances" table
        $currentDateTime = Carbon::parse($startTime);
    
        $dueDateTime = Carbon::parse($dueDate);
        $duration = $dueDateTime->diffInMinutes($currentDateTime);
    
        $availableTechnicians = $this->getAvailableMechanic($dueDate, $duration);
    
        return view('dumaguete.maintenance_request.mechanic.edit', compact('data', 'availableTechnicians'));
    }
    
    public function upReq($id)
    {



        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.update', compact('data'));
    }


    public function decline($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        return view('dumaguete.maintenance_request.decline', compact('data'));
    }
    public function declinew($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        return view('dumaguete.maintenance_request.declinew', compact('data'));
    }
    public function declineb($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        return view('dumaguete.maintenance_request.decline', compact('data'));
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
            'technician_id' => 'required|exists:users,id',
        ]);
    
        $technician = User::findOrFail($validatedData['technician_id']);
    
        $data = Maintenance::findOrFail($id);
        $data->name = $validatedData['name'];
        $data->phone = $validatedData['phone'];
        $data->address = $validatedData['address'];
        $data->description = $validatedData['description'];
        $data->req_date = $validatedData['req_date'];
        $data->task_due_date = $validatedData['task_due_date'];
        $data->acceptd = $validatedData['acceptd'];
        $data->status = $validatedData['status'];
        $data->technician_id = $technician->id;
        $data->save();
    
        return redirect()->route('accept')->with('success', 'Request accepted!');
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
        return redirect()->route('declined.list')
            ->with('success', 'Request successfully declined!');
    }

        
    public function declineRequestw(Request $request, $id)
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
        return redirect()->route('declined.list')
            ->with('success', 'Request successfully declined!');
    }

    public function updateX(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'purok' => 'required',
            'barangay' => 'required',
            'city_m' => 'required',
            'description' => 'required',
         
        ]);

        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->house_no = $request->house_no;
        $data->purok = $request->purok;
        $data->barangay = $request->barangay;
        $data->city_m = $request->city_m;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('mreq')
            ->with('success', 'Request Updated');
    }
}
