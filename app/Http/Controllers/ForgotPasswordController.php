<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\ForgotPassworRequest;
use App\Notifications\ResetPasswordVerificationNotification;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(ForgotPassworRequest $request){
        $input = $request->only('email');
        $user = User::where('email', $input)->first();
        $user->notify(new ResetPasswordVerificationNotification());
        $success['success'] = true;
        return response()->json($success,200);
    }
}
