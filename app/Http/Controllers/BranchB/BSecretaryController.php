<?php

namespace App\Http\Controllers\BranchB;


use App\Models\BayawanUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
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

        //Dumaguete branch
        $total = DB::table('maintenances')->where([
            ["branch", "=", 2],
        ])
            ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "pending"],
        ])
            ->count();
        $accepted = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
        ])
            ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
        ])
            ->count();
        $declined = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 2],
        ])
            ->count();
        return view('branchb.secretary.index', ['total' => $total, 'pending' => $pending, 'accepted' => $accepted, 'completed' => $completed, 'declined' => $declined]);
    }




    function profile()
    {
        return view('branchb.secretary.profile.index');
    }



    public function update(Request $request)
    {

        //$user =  User::find(Auth::user()->id);
        $user_id = Auth::guard('bsec')->user()->id;
        $user = BayawanUser::findOrFail($user_id);

        if ($request->hasFile('picture')) {

            $destination = 'uploads/profile/' . $user->picture;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->picture = $filename;
        }
        $user->update();
        return redirect()->back()->with('status', 'Ok');
    }



    public function bsecChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string', 'min:6'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
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


    function bsecUpdateInfo(Request $request)
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

    public function Login(BranchBLRequest $request)
    {

        $check = $request->all();

        if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '1'])) {

            return redirect()->route('managerb.dashboard')->with('error', 'Admin Login Successfully');
        }
        
        else if(Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '2'])) {

            return redirect()->route('bsec.dashboard')->with('error', 'Admin Login Successfully');
        } else if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '3'])) {

            return redirect()->route('btec.dashboard')->with('error', 'Admin Login Successfully');
        }else if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '4'])) {

            return redirect()->route('brownlinesb.dashboard')->with('error', 'Admin Login Successfully');
        }else if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '5'])) {

            return redirect()->route('mechanicbywn.dashboard')->with('error', 'Mechanic Login Successfully');
        }else if (Auth::guard('bsec')->attempt(['email' => $check['email'], 'password' => $check['password'], 'role' => '6'])) {

            return redirect()->route('workexpertb.dashboard')->with('error', 'Mechanic Login Successfully');
        }
   
        else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    public function BsecBLogout()
    {
        Auth::guard('bsec')->logout();
        return redirect()->route('userB_loginform')->with('success', 'Logout Successfully!');
    }

    public function Register()
    {
        return view('branchb.userAuth.register');
    }



    public function BsecRegisterCreate(BranchBSRequest $request)
    {

        BayawanUser::insert([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'bdate' => $request->bdate,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);
        return redirect()->route('userB_loginform')->with('success', 'User Created Successfully!');
    }



    public function SecWl(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 3],
            ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $data = $query->paginate(2);
        return view('branchb.secretary.techlist.index', compact('data', 'keyword'));
    }

    public function SecBl(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")->where([
            ["role", "=", 4],
        ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $wbl = $query->paginate(2);
        return view('branchb.secretary.btechlist.index', compact('wbl', 'keyword'));
    }


    public function SemMec(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 5]
            ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $mec = $query->paginate(2);
        return view('branchb.secretary.mechlist.index', compact('mec', 'keyword'));
    }

    public function getCList(Request $request)
{
    $keyword = $request->input('search');
    $query = BayawanUser::select("*")
        ->where([
            ["role", "=", 0],
        ]);
    if ($keyword) {
        $query->where(function($q) use ($keyword) {
            $q->where('fname', 'LIKE', "%$keyword%")
              ->orWhere('email', 'LIKE', "%$keyword%");
        });
    }
    $customers = $query->paginate(2);
    return view('branchb.secretary.customer.index', compact('customers', 'keyword'));
}
}
