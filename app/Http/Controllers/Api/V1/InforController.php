<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Mail\SendMailreset;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InforController extends Controller
{
    use SendsPasswordResetEmails;
    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validations fails',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'message' => 'Password successfully updated',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Old password does not matched',
            ], 400);
        }
    }

    public function updatePhone(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validations fails',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        if ($user->phone != null) {
            $user->update([
                'phone' => $request->phone
            ]);
            return response()->json([
                'message' => 'Phone successfully verified!',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Phone does not matched',
            ], 400);
        }
    }

    public function index()
    {
        $policies = Policy::all();

        return response()->json($policies);
    }


    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'Email not found.'], 404);
        }
    
        $token = app('auth.password.broker')->createToken($user);
        $user->sendPasswordResetNotification($token);
    
        return response()->json(['message' => 'Password reset email sent.']);
    }
    
}
