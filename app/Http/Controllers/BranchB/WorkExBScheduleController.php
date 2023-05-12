<?php

namespace App\Http\Controllers\BranchB;

use App\Models\Maintenance;
use App\Http\Controllers\Controller;

class WorkExBScheduleController extends Controller
{
    public function Index()
    {
      
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Whitelines"],
           
        ])
        ->get();
      
        return view('branchb.workexpert.shcedule.index', compact('data'));
    }

    public function getBrownlines()
    {
     
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Brownlines"]
        ])
        ->get();

       return view('branchb.workexpert.shcedule.brownlines.index', compact('data'));
    }

    public function getMechanic()
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Mechanic"]
        ])
        ->get();
       return view('branchb.workexpert.shcedule.mechanic.index', compact('data'));
    }
}
