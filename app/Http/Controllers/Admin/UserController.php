<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\BayawanUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
    
        if ($query) {
            $data = User::where('fname', 'like', "%$query%")
                        ->orWhere('lname', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%")
                        ->paginate(10);
        } else {
            $data = User::paginate(10);

        }
    
        return view('admin.users.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        //$roles = Role::all();
        return view('admin.users.index', [
            'data' => $data,
            //'roles' => $roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$categories = Category::all();
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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


        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,

        ]);
        return to_route('users.index')->with('success', 'User updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();

        return to_route('users.index');
    }


    public function store(Request $request)
    {
        $request->validate([

            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'bdate' => ['required', 'date', 'max:255'],
            'phone' => ['required', 'String', 'min:11'],
            'email' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8'],
        ]);


        User::create([
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

 
        return to_route('users.index')->with('success', 'User Created Successfully!');
    }
}
