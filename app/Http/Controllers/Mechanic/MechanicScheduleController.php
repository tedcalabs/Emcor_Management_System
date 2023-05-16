<?php

namespace App\Http\Controllers\Mechanic;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MechanicScheduleController extends Controller
{
    public function Index(Request $request)
    {
        $search = $request->input('search');
      
        $data = Maintenance::where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technician", "=", Auth::user()->fname." ".Auth::user()->lname],
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(4);

        return view('dumaguete.mechanic.shcedule.index', compact('data'));
    }
    public function getCompletedMec(Request $request)
    {
        $search = $request->input('search');
    
        $data = Maintenance::where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "completed"],
            ["technician", "=", Auth::user()->fname." ".Auth::user()->lname],
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(4);
    
        return view('dumaguete.mechanic.shcedule.completed', compact('data', 'search'));
    }
    public function ViewDataC($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "completed"],
        ])
        
        ->take(5)->find($id);
        return view('dumaguete.mechanic.shcedule.showCompleted', compact('data'));
    }

    public function ViewData($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
        ])
        
        ->take(5)->find($id);
        return view('dumaguete.mechanic.shcedule.show', compact('data'));
    }
    



    public function Mecupdate($id)
    {

        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.mechanic.shcedule.update', compact('data'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'model' => 'required',
            'unit_info' => 'required',
            'technician' => 'required',
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
        $data->technician = $request->technician;
        $data->assessment = $request->assessment;
        $data->date_completed = $request->date_completed;
        $data->status = $request->status;  
        $data->save();
        return redirect()->route('mec.sched')
            ->with('success', 'Updated Successfully!');
    }

    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        $data->delete();
        return back();
    }
}
