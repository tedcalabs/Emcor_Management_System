<?php

namespace App\Http\Controllers\Admin;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function upReqD($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('admin.request.duma.edit', compact('data'));
    }

    public function ViewData($id)
    {
        $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
        ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
        ->where([
            ["maintenances.branch", "=", 1],
        ])
        
        ->take(5)->find($id);
        return view('admin.request.duma.show', compact('data'));
    }

    public function ViewDataB($id)
    {
        $data = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
        ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
        ->where([
            ["maintenances.branch", "=", 2],
        ])
        
        ->take(5)->find($id);
        return view('admin.request.bayawan.show', compact('data'));
    }

    public function upReqB($id)
    {
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('admin.request.bayawan.edit', compact('data'));
    }

    public function destroyDr($id)
    {
        $data = Maintenance::where('branch', 1)->findOrFail($id);
        $data->delete();
        return back();
    }
    

    public function upReqDx(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'model' => 'required',
            'unit_info' => 'required',
            'description' => 'required',
            'req_date' => 'required',
        ]);

        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->model = $request->model;
        $data->serial_no = $request->serial_no;
        $data->unit_info = $request->unit_info;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->req_date = $request->req_date;
        $data->save();
        return redirect()->route('duma.mtnc.request')
            ->with('success', 'Request Updated');
    }

    public function upReqBx(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'model' => 'required',
            'unit_info' => 'required',
            'description' => 'required',
            'req_date' => 'required',
           
        ]);

        $data = Maintenance::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->model = $request->model;
        $data->serial_no = $request->serial_no;
        $data->unit_info = $request->unit_info;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->req_date = $request->req_date;
   
        $data->save();
        return redirect()->route('bayawan.mtnc.request')
            ->with('success', 'Request Updated');
    }

    public function destroyBr($id)
    {
        $data = Maintenance::where('branch', 2)->findOrFail($id);
        $data->delete();
        return back();
    }
}
