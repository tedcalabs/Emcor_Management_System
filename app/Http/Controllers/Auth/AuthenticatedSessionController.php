<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     * 
     *
     */
    public function create()
    {
        return view('auth.login');
    }



    public function index()
    {
        return view('auth.login');
    }



    public function testreg()
    {
        return view('auth.tesreg');
    }



    public function test()
{
   return view('auth.testlogin');
}

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user_role = Auth::user()->role;
     


        if ($user_role == 1) {

            return redirect()->route('manager.dashboard');
        } else if ($user_role == 1) {

            return redirect()->intended(RouteServiceProvider::MGRHOME);
            
        } else if ($user_role == 2 ) {

            return redirect()->route('secretary.dashboard');
        } else if ($user_role == 3 ) {

            return redirect()->route('technician.dashboard');
        }else{
            return redirect('/');
        }


    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
