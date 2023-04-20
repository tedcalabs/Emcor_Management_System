<?php

namespace App\Http\Controllers\DumagueteB;

use App\Models\User;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
  
public function index()
{
    $total = DB::table('maintenances')->where([
        ["branch", "=", 1],
    ])
    ->count();
    $pending = DB::table('maintenances')->where([
        ["branch", "=", 1],
        ["status", "=", "pending"],
    ])
    ->count();
    $accepted = DB::table('maintenances')->where([
        ["branch", "=", 1],
        ["acceptd", "=", 1],
    ])
    ->count();
    $completed = DB::table('maintenances')->where([
        ["branch", "=", 1],
        ["status", "=", "completed"],
    ])
    ->count();
    $declined = DB::table('maintenances')->where([
        ["branch", "=", 1],
        ["acceptd", "=", 2],
    ])
    ->count();
    return view('dumaguete.manager.index', ['total' => $total,'pending' => $pending,'accepted' => $accepted,'completed' => $completed, 'declined' => $declined, ]);   
}

public function getwhitelines()
{


    $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["category", "=", "Whitelines"]
        ])
        ->paginate(2);


    return view('dumaguete.manager.transaction.whitelines.index', compact('data'));
}
public function getBrownlines()
{



    $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["category", "=", "Brownlines"]
        ])
        ->paginate(2);

    return view('dumaguete.manager.transaction.brownlines.index', compact('data'));
}

public function getMechanic()
{


    $data = Maintenance::select("*")
        ->where([
            ["branch", "=", 1],
            ["category", "=", "Mechanic"]
        ])
        ->get();


    return view('dumaguete.manager.transaction.mechanic.index', compact('data'));
}



public function emSec()
{
    $secretaries = User::select("*")
    ->where([
        ["role", "=", 2],
    ])
    ->paginate(2);
    return view('dumaguete.manager.employee.secretary.index', compact('secretaries'));
}


public function emWl()
{


    $wtec = User::select("*")
    ->where([
        ["role", "=", 3],
    ])
    ->get();  
    return view('dumaguete.manager.employee.whitelinetec.index',compact('wtec'));
}


public function emBl()
{
    $wbl = User::select("*")
    ->where([
        ["role", "=", 5],
    ])
    ->get();  
    return view('dumaguete.manager.employee.brownlinetec.index', compact('wbl'));
}


public function emWe()
{
    $wex = User::select("*")
    ->where([
        ["role", "=", 6],
    ])
    ->get();  
    return view('dumaguete.manager.employee.workex.index', compact('wex'));
}
public function emMec()
{
    $mec = User::select("*")
    ->where([
        ["role", "=", 5],
    ])
    ->get();  
    return view('dumaguete.manager.employee.mechanic.index', compact('mec'));
}

public function getCustomerList()
{
    $customers = User::select("*")
    ->where([
        ["role", "=", 0],
    ])
    ->get();  
    return view('dumaguete.manager.customer.index', compact('customers'));
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
