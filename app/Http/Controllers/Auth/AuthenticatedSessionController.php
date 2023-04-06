<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }



    public function index()
    {
        return view('auth.login');
    }



//     public function testreg()
//     {
//         return view('auth.tesreg');
//     }



//     public function test()
// {
//    return view('auth.testlogin');
// }

   
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user_role = Auth::user()->role;
     


        if ($user_role == 1) {

            return redirect()->route('manager.dashboard');
        }else if ($user_role == 2 ) {

            return redirect()->route('secretary.dashboard');
        } else if ($user_role == 3 ) {

            return redirect()->route('technician.dashboard');
        } else if ($user_role == 4 ) {

            return redirect()->route('mechanic.dashboard');
        } else if ($user_role == 5) {

            return redirect()->route('brownlines.dashboard');
        }else if ($user_role == 6) {

            return redirect()->route('workexpert.dashboard');
        }
               
        else{
            return redirect('/');
        }


    }

  
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
