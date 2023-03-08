<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Adminx;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminxController extends Controller
{


    public function Index()
    {
        return view('branch.bayawan.adminx.adminx_login');
    }

    public function Dashboardx()
    {
        return view('branch.bayawan.index');
    }

    public function Loginx(Request $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('adminx')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('adminx.dashboardx')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function AdminLogout()
    {
        Auth::guard('adminx')->logout();
        return redirect()->route('login_formx')->with('error', 'Logout Successfully!');
    }

    public function Registerx()
    {
        return view('branch.bayawan.adminx.adminx_register');
    }



    public function AdminRegisterCreatex(Request $request)
    {
        //dd($request->all());
        Adminx::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_formx')->with('error', 'User Created Successfully!');
    }
}
