<?php

namespace App\Http\Controllers\Technician;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Maintenance;


class ScheduleController extends Controller
{
    public function Index()
    {
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["tech", "=", "5"],
            ["status", "=", "pending"],
        ])
        ->get();
      
        return view('dumaguete.technician.shcedule.index', compact('data'));
    }






    public function updateD($id)
    {
        
        $data = Maintenance::where('branch', 1)->take(5)->find($id);
        return view('dumaguete.technician.shcedule.update', compact('data'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
       
            
            ]);


            $data = Maintenance::find($id);
            $data->status = $request->status;       
            $data->save();
            return redirect()->route('tech.sched')
            ->with('success','Updated Successfully!');
       
    }
    



}
