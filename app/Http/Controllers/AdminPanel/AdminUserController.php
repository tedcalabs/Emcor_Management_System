<?php

namespace App\Http\Controllers\AdminPanel;


//use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use Illuminate\Validation\Rules;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('data', 'roles'));
    }



    function profile()
    {
        return view('admin.profile');
    }


    /*

    public function fetch()
    {
        $data = User::all();
        return response()->json([
            'data' => $data,
        ]);
    }

*/


/*

    public function edit($id)
    {
        $data = User::find($id);
        if ($data) {
            return response()->json([
                'status' => 200,
                'user' => $data,
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Student Found.'
            ]);
        }
    }



*/
public function edit(User $users)
{
  
    //return view('admin.users.edit');
}



    public function create()
    {
        //
    }

/*

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $data = new User;
            $data->name = $request->input('name');
            $data->phone = $request->input('phone');
            $data->email = $request->input('email');
            $data->password = $request->input('password');
            $data->role = $request->input('role');
            $data->save();
            return response()->json([
                'status' => 200,
                'message' => 'Student Added Successfully.'
            ]);
        }
    }
    
    */
    
    
    /*
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'String', 'min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', Rules\Password::defaults()],
        ]);


        //  return response()->json(['errors' => 'Failed Validation'], 403);


        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('roles')) {
            $user->roles()->attach($request->roles);
        }
    }*/
  
    public function show($id)
    {
        //
    }

/*
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        } else {
            $todolist = User::find($id);
            if ($todolist) {
                $todolist->name = $request->input('name');
                $todolist->email = $request->input('email');

                $todolist->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'List Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No List Found.'
                ]);
            }
        }
    }
*/
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $todolist = User::find($id);
        if ($todolist) {
            $todolist->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Deleted Successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No list Found.'
            ]);
        }
    }






}
