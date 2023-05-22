<?php

namespace App\Http\Controllers\DumagueteB;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BrowlinesTechController extends Controller
{
    public function index()
    {
        $technician = Auth::user();
        $allsched = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["technician_id", "=", $technician->id]
        ])
            ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technician_id", "=", $technician->id]
        ])
            ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 1],
            ["status", "=", "completed"],
            ["technician_id", "=", $technician->id]
        ])
        ->count();
        return view('dumaguete.brownlinestech.index',['allsched' => $allsched, 'pending' => $pending, 'completed' => $completed]);
    }

    
    function profile()
    {
        return view('dumaguete.brownlinestech.profile.index');
    }


    
    public function update(Request $request)
    {


        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

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





    function blUpdateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'bdate' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email,'. Auth::user()->id,

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



    
    public function blChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, Auth::user()->password);
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
