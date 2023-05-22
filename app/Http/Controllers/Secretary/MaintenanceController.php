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
        
        $data = $query->paginate(5);
    
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
        
        $data = $query->paginate(5);
    
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
        
        $data = $query->paginate(5);

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
        'address' => $mrRequest->address,
        'phone' => $mrRequest->phone,
        'branch' => $mrRequest->branch,
        'description' => $mrRequest->description,
        'category' => $mrRequest->category,
        'acceptd' => $mrRequest->acceptd,
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
    $data = Maintenance::select("*")
    ->where([
        ["branch", "=", 1],
        ["acceptd", "=", 1]
    ])
    
    ->take(5)->find($id);
    return view('dumaguete.maintenance_request.showaceted', compact('data'));
}


    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        $data->delete();
        return back();
    }

    
    public function updateReq($id)
    {
        $technicians = User::where('role', 3)->get();
        $technician = User::select("*")
            ->where([
                ["role", "=", 3],
                ["status", "=", 1],
                ["sched_status", "=", "available"],
            ])
            ->get();
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.maintenance_request.edit', compact('data', 'technician','technicians'));
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

    public function updateMechReq($id)
    {
    
        $technician = User::select("*")
            ->where([
                ["role", "=", 4],
                ["status", "=", 1],
                //["sched_status", "=", "available"],
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
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //         'description' => 'required',
    //         'req_date' => 'required',
    //         'acceptd' => 'required',
    //         'status' => 'required',
    //     ]);


    //     $data = Maintenance::find($id);
    //     $data->name = $request->name;
    //     $data->phone = $request->phone;
    //     $data->address = $request->address;
    //     $data->description = $request->description;
    //     $data->req_date = $request->req_date;
    //     $data->acceptd = $request->acceptd;
    //     $data->status = $request->status;
    //     $data->technician = $request->technician;
    //     $data->save();
    //     return redirect()->route('accept')
    //         ->with('success', 'Request accepted!');
    // }

    // public function update(Request $request, $id)
    // {
    //     // $request->validate([
    //     //     'name' => 'required',
    //     //     'address' => 'required',
    //     //     'phone' => 'required',
    //     //     'description' => 'required',
    //     //     'req_date' => 'required',
    //     //     'acceptd' => 'required',
    //     //     'status' => 'required',
    //     // ]);

    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'address' => 'required',
    //         'phone' => 'required',
    //         'description' => 'required',
    //         'acceptd' => 'required',
    //         'status' => 'required',
    //         'task_id' => 'required|exists:tasks,id',
    //         'technician_id' => 'required|exists:users,id,role,3',
    //         'req_date' => 'required|date_format:Y-m-d H:i:s',
    //     ]);


       
    //     $task = Maintenance::findOrFail($validatedData['task_id']);
    //     $technician = User::findOrFail($validatedData['technician_id']);
    
    //     // Assign the task to the technician
    //     $task->technician_id = $technician->id;
    //     $task->req_date = $validatedData['req_date'];

    //     $task->name = $validatedData['name'];
    //     $task->phone = $validatedData['phone'];
    //     $task->address = $validatedData['address'];
    //     $task->description = $validatedData['description'];
    //     $task->acceptd = $validatedData['acceptd'];
    //     $task->status = $validatedData['status'];
    //     $task->save();
    


    //     // $data = Maintenance::find($id);
    //     // $data->name = $request->name;
    //     // $data->phone = $request->phone;
    //     // $data->address = $request->address;
    //     // $data->description = $request->description;
    //     // $data->req_date = $request->req_date;
    //     // $data->acceptd = $request->acceptd;
    //     // $data->status = $request->status;
    //     // $data->technician = $request->technician;
    //     // $data->save();
    //     return redirect()->route('accept')
    //         ->with('success', 'Request accepted!');
    // }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'req_date' => 'required',
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
