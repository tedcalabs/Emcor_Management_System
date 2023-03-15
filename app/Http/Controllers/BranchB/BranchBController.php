<?php

namespace App\Http\Controllers\BranchB;



use App\Models\BranchB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\BranchBLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BranchBRegisterRequest;

class BranchBController extends Controller
{

    public function Index()
    {
        return view('branchb.auth.branchb_login');
    }

    public function Dashboard()
    {


        return view('branchb.index');
    }




    function profile()
    {
        return view('admin.profile');
    }


    public function adminChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, Auth::guard('branchb')->user()->password);
        if ($currentPasswordStatus) {

            BranchB::findOrFail(Auth::guard('branchb')->user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message', 'Password Updated Successfully');
        } else {

            return redirect()->back()->with('message', 'Current Password does not match with Old Password');
        }
    }





    function adminupdateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::guard('branchb')->user()->id,

        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = BranchB::find(Auth::guard('branchb')->user()->id)->update([
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







    public function Login(BranchBLoginRequest $request)
    {
        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('branchb')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('branchb.dashboard')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function BranchBLogout()
    {
        Auth::guard('branchb')->logout();
        return redirect()->route('login_form')->with('error', 'Logout Successfully!');
    }

    public function Register()
    {
        return view('branchb.auth.branchb_register');
    }



    public function BranchBRegisterCreate(BranchBRegisterRequest $request)
    {
        //dd($request->all());
        BranchB::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('branchb_loginform')->with('success', 'User Created Successfully!');
    }
}
