<?php

namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SecretaryController extends Controller
{

    public function index()
    {
        //Dumaguete branch
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
        // return view('secdashboard');
        return view('secdashboard', ['total' => $total, 'pending' => $pending, 'accepted' => $accepted, 'completed' => $completed, 'declined' => $declined]);
    }

    function profile()
    {
        return view('dumaguete.profile.secretary_profile');
    }




    public function destroy($id)
    {
        //
    }


    public function getTechList(Request $request)
    {
        $query = $request->input('q');

        if ($query) {
            $data = User::where('fname', 'like', "%$query%")
                ->orWhere('lname', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->paginate(4);
        } else {
            $data = User::paginate(10);
        }

        return view('dumaguete.secretary.techlist.index', compact('data'));
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




    public function update(Request $request)
    {


        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

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




    function updateInfo(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'bdate' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email,' . Auth::user()->id,

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




    public function SecWl(Request $request)
    {
        $keyword = $request->input('search');
        $query = User::select("*")
            ->where([
                ["role", "=", 3],
            ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $data = $query->paginate(10);
        return view('dumaguete.secretary.techlist.index', compact('data', 'keyword'));
    }

    public function SecBl(Request $request)
    {
        $keyword = $request->input('search');
        $query = User::select("*")->where([
            ["role", "=", 5],
        ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $wbl = $query->paginate(10);
        return view('dumaguete.secretary.btechlist.index', compact('wbl', 'keyword'));
    }


    public function SemMec(Request $request)
    {
        $keyword = $request->input('search');
        $query = User::select("*")
            ->where([
                ["role", "=", 4]
            ]);
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('fname', 'LIKE', "%$keyword%")
                    ->orWhere('email', 'LIKE', "%$keyword%");
            });
        }
        $mec = $query->paginate(10);
        return view('dumaguete.secretary.mechlist.index', compact('mec', 'keyword'));
    }

    public function getCList(Request $request)
{
    $keyword = $request->input('search');
    $query = User::select("*")
        ->where([
            ["role", "=", 0],
        ]);
    if ($keyword) {
        $query->where(function($q) use ($keyword) {
            $q->where('fname', 'LIKE', "%$keyword%")
              ->orWhere('email', 'LIKE', "%$keyword%");
        });
    }
    $customers = $query->paginate(10);
    return view('dumaguete.secretary.customer.index', compact('customers', 'keyword'));
}
}
