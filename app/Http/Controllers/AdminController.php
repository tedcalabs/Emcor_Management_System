<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Rules\PasswordValidator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{


    public function Index()
    {
        return view('admin.admin_login');
    }

    public function Dashboard()
    {
//Dumaguete branch
        $total = DB::table('maintenances')->where([
            ["branch", "=", 1],
        ])
        ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["status", "=", "pending"],
        ])
        ->count();
        $accepted = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
        ])
        ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["status", "=", "completed"],
        ])
        ->count();
        $declined = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["acceptd", "=", 2],
        ])
        ->count();
//Byawan Branch
        $totalb = DB::table('maintenances')->where([
            ["branch", "=", 2],
        ])
        ->count();
        $pendingb = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "pending"],
        ])
        ->count();
        $acceptedb = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
        ])
        ->count();
        $completedb = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
        ])
        ->count();
        $declinedb = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 2],
        ])
        ->count();
        return view('admin.index',['total' => $total,'pending' => $pending,'accepted' => $accepted,'completed' => $completed, 'declined' => $declined, 'totalb' => $totalb,'pendingb' => $pendingb,'acceptedb' => $acceptedb,'completedb' => $completedb, 'declinedb' => $declinedb,]);
    }
    public function getDumaRequest(Request $request)
    {

        $keyword = $request->input('search');
    
        $q = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 1],
             
            ]);
        
        if ($keyword) {
            $q->where(function ($query) use ($keyword) {
                $query->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $q->paginate(10);
    
    
        return view('admin.request.duma.index', compact('data','keyword'));
    }
    



    public function getBayawanRequest(Request $request)
    {
        $keyword = $request->input('search');
    
        $q = Maintenance::select("maintenances.*", "users.fname as technician_fname", "users.lname as technician_lname")
            ->leftJoin('users', 'maintenances.technician_id', '=', 'users.id')
            ->where([
                ["maintenances.branch", "=", 2],
             
            ]);
        
        if ($keyword) {
            $q->where(function ($query) use ($keyword) {
                $query->where('maintenances.name', 'LIKE', "%$keyword%")
                    ->orWhere('maintenances.description', 'LIKE', "%$keyword%")
                    ->orWhere('users.fname', 'LIKE', "%$keyword%")
                    ->orWhere('users.lname', 'LIKE', "%$keyword%");
            });
        }
        
        $data = $q->paginate(10);
    
        return view('admin.request.bayawan.index', compact('data'));
    }




    function profile()
    {
        return view('admin.profile');
    }




    public function Login(LoginRequest $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('success', 'Logout Successfully!');
    }

    public function Register()
    {
        return view('admin.admin_register');
    }


    public function AdminRegisterCreate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
           // 'password' => 'required|min:8|confirmed',
           'password' => ['required', 'confirmed', new PasswordValidator],
        ]);
    
        Admin::insert([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'created_at' => Carbon::now(),
        ]);
    
        return redirect()->route('login_form')->with('success', 'User Created Successfully!');
    }
    
}
