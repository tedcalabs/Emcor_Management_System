<?php

namespace App\Http\Controllers\Technician;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkEScheduleController extends Controller
{   
    public function Index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
        ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
        ->where([
            ["maintenances.branch", "=", 1],
            ["maintenances.acceptd", "=", 1],
            ["maintenances.status", "=", "pending"],
            ["maintenances.category", "=", "Whitelines"],
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                ->orWhere('users.fname', 'LIKE', "%$keyword%")
                ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
    
        return view('dumaguete.workexpert.shcedule.index', compact('data','keyword'));
    }
    

    public function getBrownlines(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
        ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
        ->where([
            ["maintenances.branch", "=", 1],
            ["maintenances.acceptd", "=", 1],
            ["maintenances.status", "=", "pending"],
            ["maintenances.category", "=", "Brownlines"],
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                ->orWhere('users.fname', 'LIKE', "%$keyword%")
                ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
    
        return view('dumaguete.workexpert.shcedule.brownlines.index', compact('data','keyword'));
    }
    

    public function getMechanic(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
        ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
        ->where([
            ["maintenances.branch", "=", 1],
            ["maintenances.acceptd", "=", 1],
            ["maintenances.status", "=", "pending"],
            ["maintenances.category", "=", "Mechanic"],
        ]);
    
        // Check if search keyword is provided
        if ($request->has('search')) {
            $keyword = $request->input('search');
            $query->where(function ($q) use ($keyword) {
                $q->where('maintenances.name', 'LIKE', "%$keyword%")
                ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                ->orWhere('users.fname', 'LIKE', "%$keyword%")
                ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
    
        return view('dumaguete.workexpert.shcedule.mechanic.index', compact('data'));
    }
    
}
