<?php

namespace App\Http\Controllers\BranchB;

use App\Models\User;
use App\Models\BayawanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MechanicBController extends Controller
{
    public function index()
    {

        $allsched = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["technician", "=", Auth::guard('bsec')->user()->fname." ".Auth::guard('bsec')->user()->lname],
        ])
            ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technician", "=", Auth::guard('bsec')->user()->fname." ".Auth::guard('bsec')->user()->lname],
        ])
            ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
            ["technician", "=", Auth::guard('bsec')->user()->fname." ".Auth::guard('bsec')->user()->lname],
        ])
        ->count();
        return view('branchb.mechanic.index',['allsched' => $allsched, 'pending' => $pending, 'completed' => $completed]);
    }

    
    function profile()
    {
        return view('branchb.mechanic.profile.index');
    }



    
    public function update(Request $request)
    {


        $user_id = Auth::guard('bsec')->user()->id;
        $user = BayawanUser::findOrFail($user_id);

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



    
    function mecupdateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'bdate' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::guard('bsec')->user()->id,

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = BayawanUser::find(Auth::guard('bsec')->user()->id)->update([
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


    

    public function mecChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('bsec')->user()->password);
        if ($currentPasswordStatus) {

            BayawanUser::findOrFail(Auth::guard('bsec')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }
}
