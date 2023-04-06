<?php

namespace App\Http\Controllers\Technician;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlTechnicianScheduleController extends Controller
{
    public function Index()
    {
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technician", "=", Auth::user()->fname." ".Auth::user()->lname],
        ])
        ->get();
      
        return view('dumaguete.brownlinestech.shcedule.index', compact('data'));
    }






    public function Mupdate($id)
    {
        
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.brownlinestech.shcedule.update', compact('data'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
       
            
            ]);


            $data = Maintenance::find($id);
            $data->status = $request->status;       
            $data->save();
            return redirect()->route('bl.sched')
            ->with('success','Updated Successfully!');
       
    }
    
    public function deleteReq($id)
    {
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        $data->delete();
        return back();
    }
}
