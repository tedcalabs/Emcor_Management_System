<?php

namespace App\Http\Controllers\Technician;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkEScheduleController extends Controller
{    public function Index()
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
            ["acceptd", "=", 0],
            ["category", "=", "Brownlines"]
        ])
        ->get();

       return view('dumaguete.maintenance_request.brownlines.index', compact('data'));
    }

    public function getMechanic()
    {
    

        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["acceptd", "=", 0],
            ["category", "=", "Mechanic"]
        ])
        ->get();


       return view('dumaguete.maintenance_request.mechanic.index', compact('data'));
    }
}
