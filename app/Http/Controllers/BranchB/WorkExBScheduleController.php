<?php

namespace App\Http\Controllers\BranchB;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class WorkExBScheduleController extends Controller
{
    public function Index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "bayawan_users.fname as technician_fname", "bayawan_users.lname as technician_lname")
        ->leftJoin('bayawan_users', 'maintenances.technicianb_id', '=', 'bayawan_users.id')
        ->where([
            ["maintenances.branch", "=", 2],
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
                ->orWhere('bayawan_users.fname', 'LIKE', "%$keyword%")
                ->orWhere('bayawan_users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
      
        return view('branchb.workexpert.shcedule.index', compact('data'));
    }

    public function getBrownlines(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "bayawan_users.fname as technician_fname", "bayawan_users.lname as technician_lname")
        ->leftJoin('bayawan_users', 'maintenances.technicianb_id', '=', 'bayawan_users.id')
        ->where([
            ["maintenances.branch", "=", 2],
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
                ->orWhere('bayawan_users.fname', 'LIKE', "%$keyword%")
                ->orWhere('bayawan_users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
       return view('branchb.workexpert.shcedule.brownlines.index', compact('data'));
    }

    public function getMechanic(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("maintenances.*", "bayawan_users.fname as technician_fname", "bayawan_users.lname as technician_lname")
        ->leftJoin('bayawan_users', 'maintenances.technicianb_id', '=', 'bayawan_users.id')
        ->where([
            ["maintenances.branch", "=", 2],
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
                ->orWhere('bayawan_users.fname', 'LIKE', "%$keyword%")
                ->orWhere('bayawan_users.lname', 'LIKE', "%$keyword%");
            });
        }
    
        $data = $query->paginate(10);
       return view('branchb.workexpert.shcedule.mechanic.index', compact('data'));
    }
}
