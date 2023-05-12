<?php

namespace App\Http\Controllers\Technician;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkEScheduleController extends Controller
{   
    
    public function Index()
    {
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Whitelines"],
           
        ])
        ->get();
      
        return view('dumaguete.workexpert.shcedule.index', compact('data'));
    }

    public function getBrownlines()
    {
     
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Brownlines"]
        ])
        ->get();

       return view('dumaguete.workexpert.shcedule.brownlines.index', compact('data'));
    }

    public function getMechanic()
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Mechanic"]
        ])
        ->get();
       return view('dumaguete.workexpert.shcedule.mechanic.index', compact('data'));
    }
}
