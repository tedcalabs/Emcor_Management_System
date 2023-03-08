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

            return redirect()->route('secretary.dashboard');
        } else if ($user_role == 1 && $user_branch == 1) {

            return redirect()->intended(RouteServiceProvider::MGRHOME);
            
        } else if ($user_role == 2 && $user_branch == 1) {

            return redirect()->route('secretary.dashboard');
        } else if ($user_role == 2 && $user_branch == 2) {

            return redirect()->intended(RouteServiceProvider::BSECHOME);
        } else if ($user_role == 3 && $user_branch == 1) {

            return redirect()->intended(RouteServiceProvider::TECHOME);
        }else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        /*


        switch ($user_role) {

            case 1:
                return redirect()->intended(RouteServiceProvider::MGRHOME);
                break;

            case 2:
                return redirect()->intended(RouteServiceProvider::SECHOME);
                break;

            case 3:
                return redirect()->intended(RouteServiceProvider::TECHOME);
                break;


            case 4:
                return redirect()->intended(RouteServiceProvider::MECHOME);
                break;

            default:

                return redirect()->intended(RouteServiceProvider::HOME);
        }

        */
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
