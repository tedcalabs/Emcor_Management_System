<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    public function picture()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {


        $user_id = Auth::guard('admin')->user()->id;
        $user = Admin::findOrFail($user_id);

        if ($request->hasFile('picture')) {
          
            $destination = 'uploads/profile/'. $user->picture;

            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->picture = $filename;
        }
        $user->update();
        return redirect()->back()->with('status','Ok');
    }


    
    
    function updateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. Auth::guard('admin')->user()->id,

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = Admin::find(Auth::guard('admin')->user()->id)->update([
                'name' => $request->fname,
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
    
        $currentPasswordStatus = Hash::check($request->current_password, auth()->guard('admin')->user()->password);
        if ($currentPasswordStatus) {
    
            Admin::findOrFail(Auth::guard('admin')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
    
            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {
    
            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
    
}
