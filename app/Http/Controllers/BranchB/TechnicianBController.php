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

class TechnicianBController extends Controller
{
    public function index()
    {

        $technician = Auth::guard('bsec')->user();

        $allsched = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["technicianb_id", "=", $technician->id]
        ])
            ->count();
        $pending = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
            ["technicianb_id", "=", $technician->id]
        ])
            ->count();
        $completed = DB::table('maintenances')->where([
            ["branch", "=", 2],
            ["status", "=", "completed"],
            ["technicianb_id", "=", $technician->id]
        ])
        ->count();
        return view('branchb.technician.index',['allsched' => $allsched, 'pending' => $pending, 'completed' => $completed]);
    }


    public function Logout()
    {
        Auth::guard('bsec')->logout();
        return redirect()->route('userB_loginform')->with('success', 'Logout Successfully!');
    }


    

    function profile()
    {
        return view('branchb.technician.profile.index');
    }





    public function btecChangePassword(Request $request)
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



    public function updateB($id)
    {
        
        $data = Maintenance::where('branch', 2)->take(5)->find($id);
        return view('branchb.technician.shcedule.update', compact('data'));
    }

    public function deleteReq($id)
    {
       $data = Maintenance::where('branch', 2)->findOrFail($id);
        $data->delete();
        return back();
    }
    function btecUpdateInfo(Request $request)
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


    public function getWhiteSched(Request $request)
    {
        
        $technician = Auth::guard('bsec')->user();

        $search = $request->input('search');
      
        $data = Maintenance::where([
            ["branch", "=", 2],
            ["acceptd", "=", 1],
            ["status", "=", "pending"],
         ["technicianb_id", "=", $technician->id]
        ])
        ->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
                // Add additional columns as needed
            });
        })
        ->paginate(10); // Specify the number of items per page (e.g., 10)
      
        return view('branchb.technician.shcedule.index', compact('data', 'search'));
    }

    

}
