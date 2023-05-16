<?php

namespace App\Http\Controllers\Technician;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkEScheduleController extends Controller
{   
    public function Index(Request $request)
    {
        $query = Maintenance::query();
        $query->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Whitelines"],
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $searchKeyword = $request->input('search');
            $query->where(function ($innerQuery) use ($searchKeyword) {
                $innerQuery->where('name', 'like', '%' . $searchKeyword . '%');
            });
        }
    
        $data = $query->paginate(5);
    
        return view('dumaguete.workexpert.shcedule.index', compact('data'));
    }
    

    public function getBrownlines(Request $request)
    {
        $query = Maintenance::query();
        $query->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Brownlines"],
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $searchKeyword = $request->input('search');
            $query->where(function ($innerQuery) use ($searchKeyword) {
                $innerQuery->where('name', 'like', '%' . $searchKeyword . '%');
                     
                // Add more columns as needed for your search
            });
        }
    
        $data = $query->paginate(5);
    
        return view('dumaguete.workexpert.shcedule.brownlines.index', compact('data'));
    }
    

    public function getMechanic(Request $request)
    {
        $query = Maintenance::query();
        $query->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["category", "=", "Mechanic"]
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $searchKeyword = $request->input('search');
            $query->where(function ($innerQuery) use ($searchKeyword) {
                $innerQuery->where('name', 'like', '%' . $searchKeyword . '%');
                      
                // Add more columns as needed for your search
            });
        }
    
        $data = $query->paginate(5);
    
        return view('dumaguete.workexpert.shcedule.mechanic.index', compact('data'));
    }
    
}
