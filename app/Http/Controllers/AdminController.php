<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
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




    function profile()
    {
        return view('admin.profile');
    }




    public function Login(Request $request)
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
        return redirect()->route('login_form')->with('error', 'Logout Successfully!');
    }

    public function Register()
    {
        return view('admin.admin_register');
    }



    public function AdminRegisterCreate(Request $request)
    {
        //dd($request->all());
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('login_form')->with('success', 'User Created Successfully!');
    }
}
