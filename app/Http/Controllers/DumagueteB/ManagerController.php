<?php

namespace App\Http\Controllers\DumagueteB;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
  
public function index()
{
    return view('dumaguete.manager.index');
}

public function profile()
{
    return view('dumaguete.manager.profile.index');
}



function updateInfo(Request $request)
{

    $validator = Validator::make($request->all(), [
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'bdate' => 'required',
        'phone' => 'required',
        'gender' => 'required',
        'email' => 'required|email|unique:users,email,'. Auth::user()->id,

    ]);

    if (!$validator->passes()) {
        return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    } else {
        $query = User::find(Auth::user()->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'bdate' => $request->bdate,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,

        ]);

        if (!$query) {
            return response()->json(['status' => 0, 'msg' => 'Something went wrong.']);
        } else {
            return response()->json(['status' => 1, 'msg' => 'Your profile info has been update successfuly.']);
        }
    }
}


public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'string', 'min:8'],
        'password' => ['required', 'string', 'min:8', 'confirmed']
    ]);

    $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
    if ($currentPasswordStatus) {

        User::findOrFail(Auth::user()->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message', 'Password Updated Successfully');
    } else {

        return redirect()->back()->with('message', 'Current Password does not match with Old Password');
    }
}



}
