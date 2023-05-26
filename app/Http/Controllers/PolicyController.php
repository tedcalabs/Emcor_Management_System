<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('q');
    
        $data = Policy::when($query, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })
        ->paginate(10);
    
      
    
        return view('admin.policy.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');

        $destination = 'uploads/services/'.$image;

        if(File::exists($destination)){
            File::delete($destination);
        }
        $extension = $image->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $image->move('uploads/services/', $filename);
        $image = $filename;


        Policy::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
           

        ]);

        return to_route('policies.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = Policy::findOrFail($id);
        return view('admin.policy.edit', compact('service'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([

            'name' => 'required',
            'description' => 'required',
        ]);




        $data = Policy::find($id);
     
        $data->name = $request->name;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('policies.index')
            ->with('success', 'Request successfully declined!');
    }
    public function destroy(Policy $policy)
    {
        // Delete the image file from storage
        Storage::delete('uploads/services/' . $policy->image);
    
        // Delete the service record from the database
        $policy->delete();
    
        return redirect()->route('policies.index');
    }
}
