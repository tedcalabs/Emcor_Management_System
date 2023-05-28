<?php

namespace App\Http\Controllers\BranchB;

use App\Models\BayawanUser;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrownlinesTController extends Controller
{
    public function index()
    {
        $technician = Auth::guard('bsec')->user();
        $allsched = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["technicianb_id", "=", $technician->id],
        ])
            ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technicianb_id", "=", $technician->id],
        ])
            ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
            ["technicianb_id", "=", $technician->id],
        ])
        ->count();
        return view('branchb.brownlinestech.index',['allsched' => $allsched, 'pending' => $pending, 'completed' => $completed]);
    }


    public function getBrownSched(Request $request)
    {
        $technician = Auth::guard('bsec')->user();
       
        $search = $request->input('search');
      
        $data = Maintenance::where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technicianb_id", "=", $technician->id]
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(10); // Specify the number of items per page (e.g., 10)
      
        return view('branchb.brownlinestech.shcedule.index', compact('data', 'search'));
    }

    public function deleteReq($id)
    {
       $data = Maintenance::where('branch', 2)->findOrFail($id);
        $data->delete();
        return back();
    }


    public function updateB($id)
    {
        
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.brownlinestech.shcedule.update', compact('data'));
    }

    public function BbrownLogout()
    {
        Auth::guard('bsec')->logout();
        return redirect()->route('userB_loginform')->with('success', 'Logout Successfully!');
    }

    public function getCompleted(Request $request)

    {
        $technician = Auth::guard('bsec')->user();
        $search = $request->input('search');
    
        $data = Maintenance::where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
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
    
        return view('branchb.brownlinestech.shcedule.completed', compact('data', 'search'));
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
            return redirect()->route('getBrownSchedBl.sched')
            ->with('success','Updated Successfully!');
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
        return view('branchb.brownlinestech.shcedule.showCompleted', compact('data'));
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
        return view('branchb.brownlinestech.shcedule.show', compact('data'));
    }

}
