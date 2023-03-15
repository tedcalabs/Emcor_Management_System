<?php

namespace App\Http\Controllers\BranchB\BranchBAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BauthenticatedSessionController extends Controller
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
        $user_branch = Auth::user()->branch;


        if ($user_role == 1 && $user_branch == 2) {

            return redirect()->route('manager.dashboard');
        } else if ($user_role == 1 && $user_branch == 1) {

            return redirect()->intended(RouteServiceProvider::MGRHOME);
            
        } else if ($user_role == 2 && $user_branch == 1) {

            return redirect()->route('secretary.dashboard');
        } else if ($user_role == 2 && $user_branch == 2) {

            return redirect()->route('bsec.dashboard');



        } else if ($user_role == 3 && $user_branch == 1) {

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
