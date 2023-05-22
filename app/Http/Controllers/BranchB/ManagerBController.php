<?php

namespace App\Http\Controllers\BranchB;

use App\Models\BayawanUser;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerBController extends Controller
{
    public function index()
    {
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
        return view('branchb.manager.index', ['total' => $total,'pending' => $pending,'accepted' => $accepted,'completed' => $completed, 'declined' => $declined, ]);   
    }
    
    public function getWhitelines(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("*")
            ->where([
                ["branch", "=", 2],
                ["category", "=", "Whitelines"]
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                  ->orWhere('description', 'LIKE', "%$keyword%");
            });
        }
        $data = $query->paginate(5);
        return view('branchb.manager.transaction.whitelines.index', compact('data', 'keyword'));
    }
    

    public function ViewData($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["category", "=", "Whitelines"]
        ])
        
        ->take(5)->find($id);
        return view('branchb.manager.transaction.whitelines.show', compact('data'));
    }

    public function getBrownlines(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("*")
            ->where([
                ["branch", "=", 2],
                ["category", "=", "Brownlines"]
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                  ->orWhere('description', 'LIKE', "%$keyword%");
            });
        }
        $data = $query->paginate(5);
        return view('branchb.manager.transaction.brownlines.index', compact('data', 'keyword'));
    }

    public function ViewDataMB($id)
    {
        $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 2],
            ["category", "=", "Brownlines"]
        ])
        
        ->take(5)->find($id);
        return view('branchb.manager.transaction.brownlines.show', compact('data'));
    }
    

    public function Logout()
    {
        Auth::guard('bsec')->logout();
        return redirect()->route('userB_loginform')->with('success', 'Logout Successfully!');
    }



    public function getMechanic(Request $request)
    {
        $keyword = $request->input('search');
        $query = Maintenance::select("*")
            ->where([
                ["branch", "=", 2],
                ["category", "=", "Mechanic"]
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%$keyword%")
                  ->orWhere('description', 'LIKE', "%$keyword%");
            });
        }
        $data = $query->paginate(5);
        return view('branchb.manager.transaction.mechanic.index', compact('data', 'keyword'));
    }
    
    public function ViewDataMM($id)
{
    $data = Maintenance::select("*")
    ->where([
        ["branch", "=", 2],
        ["category", "=", "Mechanic"]
    ])
    
    ->take(5)->find($id);
    return view('branchb.manager.transaction.mechanic.show', compact('data'));
}
    
    
    public function emSec(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 2],
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $secretaries = $query->paginate(2);
        return view('branchb.manager.employee.secretary.index', compact('secretaries', 'keyword'));
    }
    
    
    public function emWl(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 3],
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $wtec = $query->paginate(5);
        return view('branchb.manager.employee.whitelinetec.index', compact('wtec', 'keyword'));
    }
    
    
    
    public function emBl(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")->where([
            ["role", "=", 4],
        ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $wbl = $query->paginate(2);
        return view('branchb.manager.employee.brownlinetec.index', compact('wbl', 'keyword'));
    }
    
    
    public function emWe(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 6]
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $wex = $query->paginate(2);
        return view('branchb.manager.employee.workex.index', compact('wex', 'keyword'));
    }
    
    public function emMec(Request $request)
    {
        $keyword = $request->input('search');
        $query = BayawanUser::select("*")
            ->where([
                ["role", "=", 5]
            ]);
        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                  ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $mec = $query->paginate(2);
        return view('branchb.manager.employee.mechanic.index', compact('mec', 'keyword'));
    }
    
    
    public function getCustomerList(Request $request)
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
        return view('branchb.manager.customer.index', compact('customers', 'keyword'));
    }
    
    
    public function profile()
    {
        return view('branchb.manager.profile.index');
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
    
    
    
    
    
    function updateInfo(Request $request)
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
    
    
    public function changePassword(Request $request)
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