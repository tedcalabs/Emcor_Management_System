<?php

namespace App\Http\Controllers\BranchB;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BayawanUser;
use Illuminate\Support\Facades\Auth;

class MechanicBScheduleController extends Controller
{
    public function Index(Request $request)
    {
        $technician = Auth::guard('bsec')->user();
        $search = $request->input('search');
      
        $data = Maintenance::where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technicianb_id", "=", $technician->id],
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(10);

        return view('branchb.mechanic.shcedule.index', compact('data'));
    }
    public function getCompletedMec(Request $request)
    {
        $technician = Auth::guard('bsec')->user();
        $search = $request->input('search');
    
        $data = Maintenance::where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
            ["technicianb_id", "=", $technician->id],
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(10);
    
        return view('branchb.mechanic.shcedule.completed', compact('data', 'search'));
    }

    public function Mecupdate($id)
    {

        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.mechanic.shcedule.update', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'model' => 'required',
            'unit_info' => 'required',
            'date_completed' => 'required',
            'description' => 'required',
            'status' => 'required',
            'assessment' => 'required',
        ]);

        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->model = $request->model;
        $data->serial_no = $request->serial_no;
        $data->unit_info = $request->unit_info;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->assessment = $request->assessment;
        $data->date_completed = $request->date_completed;
        $data->status = $request->status;  
        $data->save();

        $userId = Auth::guard('bsec')->id();
        $user = BayawanUser::findOrFail($userId);
        $user->available = true; // Set the technician as available
        $user->save();
        return redirect()->route('mechanicbywn.sched')
            ->with('success', 'Updated Successfully!');
    }

    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 2)->findOrFail($id);
        $data->delete();
        return back();
    }

    public function ViewDataC($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "completed"],
        ])
        
        ->take(5)->find($id);
        return view('branchb.mechanic.shcedule.showCompleted', compact('data'));
    }

    public function ViewData($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
        ])
        
        ->take(5)->find($id);
        return view('branchb.mechanic.shcedule.show', compact('data'));
    }
    
}
