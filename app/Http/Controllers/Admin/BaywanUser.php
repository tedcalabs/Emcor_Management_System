<?php

namespace App\Http\Controllers\Admin;

use App\Models\BayawanUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaywanUser extends Controller
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
            $data = BayawanUser::where('fname', 'like', "%$query%")
                        ->orWhere('email', 'like', "%$query%")
                        ->orWhere('role', 'like', "%$query%")
                        ->paginate(5);
        } else {
            $data = BayawanUser::paginate(5);

        }
    
        return view('admin.users.bayawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $data = BayawanUser::find($id);
        //$roles = Role::all();
        return view('admin.users.bayawan.index', [
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
    public function edit(BayawanUser $usersbyn)
    {
        return view('admin.users.bayawan.edit', compact('usersbyn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BayawanUser $usersbyn)
    {
        $request->validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'role' => 'required',
                'status' => 'required'
            ]
        );


        $usersbyn->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
        ]);
        return to_route('usersbyn.index')->with('success', 'User updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BayawanUser $usersbyn)
    {

        $usersbyn->delete();

        return to_route('usersbyn.index');
    }
}
