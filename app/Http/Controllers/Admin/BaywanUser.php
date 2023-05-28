<?php

namespace App\Http\Controllers\Admin;

use App\Models\BayawanUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class BaywanUser extends Controller
{


    public function index(Request $request)
    {
        $query = $request->input('q');
    
        if ($query) {
            $data = BayawanUser::where('fname', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%")
                        ->orWhere('role', 'like', "%$query%")
                        ->paginate(10);
        } else {
            $data = BayawanUser::paginate(10);

        }
    
        return view('admin.users.bayawan.index', compact('data'));
    }



    public function create()
    {
        return view('admin.users.bayawan.create');
    }


    public function store(Request $request)
    {
        $request->validate([

            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'String', 'min:11'],
            'email' => ['required', 'string', 'max:255', 'unique:' . BayawanUser::class],
            'password' => ['required', 'min:8'],
        ]);


        BayawanUser::create([
            'role' => $request->role,
            'status' => $request->status,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'address' => $request->address,
            'bdate' => $request->bdate,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

 
        return to_route('usersbyn.index')->with('success', 'User Created Successfully!');
    }



    public function show($id)
    {
          $data = BayawanUser::find($id);
        //$roles = Role::all();
        return view('admin.users.bayawan.index', [
            'data' => $data,
            //'roles' => $roles
        ]);
    }

    public function edit(BayawanUser $usersbyn)
    {
        return view('admin.users.bayawan.edit', compact('usersbyn'));
    }


    public function update(Request $request, BayawanUser $usersbyn)
    {
        $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'role' => 'required',
                'status' => 'required',
                'password'=> 'required|confirmed'
            ]
        );


        $usersbyn->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => $request->status,
        ]);
        return to_route('usersbyn.index')->with('success', 'User updated successfully!');
    }


    public function destroy(BayawanUser $usersbyn)
    {

        $usersbyn->delete();

        return to_route('usersbyn.index');
    }
}
