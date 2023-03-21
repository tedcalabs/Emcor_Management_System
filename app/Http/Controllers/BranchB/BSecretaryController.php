<?php

namespace App\Http\Controllers\BranchB;

use App\Models\BSecretary;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\BranchBLRequest;
use App\Http\Requests\BranchBSRequest;
use Illuminate\Support\Facades\Validator;

class BSecretaryController extends Controller
{

    public function Index()
    {
        return view('branchb.userAuth.login');
    }

    public function Dashboard()
    {


        return view('branchb.secretary.index');
    }




    function profile()
    {
        return view('branchb.secretary.profile.index');
    }



    public function update(Request $request)
    {

        //$user =  User::find(Auth::user()->id);
        $user_id = Auth::guard('bsec')->user()->id;
        $user = BSecretary::findOrFail($user_id);

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





    public function bsecChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('bsec')->user()->password);
        if ($currentPasswordStatus) {

            BSecretary::findOrFail(Auth::guard('bsec')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }





    function bsecUpdateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::guard('bsec')->user()->id,

        ]); 

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = BSecretary::find(Auth::guard('bsec')->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,

            ]);

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Something went wrong.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Your profile info has been update successfuly.']);
            }
        }
    }







    public function Login(BranchBLRequest $request)
    {
        // dd($request->all());

        $check = $request->all();




        if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '2'])) {

            return redirect()->route('bsec.dashboard')->with('error', 'Admin Login Successfully');
        } else if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '3'])) {

            return redirect()->route('btec.dashboard')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function BsecBLogout()
    {
        Auth::guard('bsec')->logout();
        return redirect()->route('bsec_loginform')->with('success', 'Logout Successfully!');
    }

    public function Register()
    {
        return view('branchb.userAuth.register');
    }



    public function BsecRegisterCreate(BranchBSRequest $request)
    {
        //dd($request->all());
        BSecretary::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('bsec_loginform')->with('success', 'User Created Successfully!');
    }
}
