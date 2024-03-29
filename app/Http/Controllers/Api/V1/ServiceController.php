<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ServiceStoreRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
    
        $services = Service::when($query, function ($query, $search) {
            return $query->where('name', 'like', '%'.$search.'%');
        })
        ->paginate(10);
    
        $categories = Category::all();
    
        return view('admin.services.index', compact('services', 'categories'));
    }


    public function create()
    {
        $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceStoreRequest $request)
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


        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
           

        ]);

        if ($request->has('categories')) {
            $service->categories()->attach($request->categories);
        }
        return to_route('services.index');
    }


    public function ViewData($id)
    {
        $data = Service::take(5)->find($id);
        return view('admin.services.show', compact('data'));
    }


    // public function show(Service $service)
    // {
    
    //     $categories = Category::all();

    //     return view('admin.services.index', compact( 'categories'));
    // }

    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }


    public function update(Request $request, Service $service)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required'
            ]
        );
        $image = $service->image;
        if ($request->hasFile('image')) {
            Storage::delete($service->image);
            $image = $request->file('image')->store('public/services');
        }

        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image
        ]);
        return to_route('services.index');
    }

    public function destroy(Service $service)
    {
        Storage::delete($service->image);
        $service->delete();

        return to_route('services.index');
    }

    public function get_popular_services(Request $request)
    {

       $list = Service::whereRelation('categories', 'category_id', 2)
        
        ->take(4)->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'category_id' => 6,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }

    public function get_whitelines_services(Request $request)
    {

        $list = Service::whereRelation('categories', 'category_id', 1)
        ->take(10)->get();
        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'category_id' => 7,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }
  
    public function get_brownlines_services(Request $request)
    {

        $list = Service::whereRelation('categories', 'category_id', 3)
        ->take(10)->get();
        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'category_id' => 8,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }

    public function get_mechanic_services(Request $request)
    {

        $list = Service::whereRelation('categories', 'category_id', 4)
        ->take(10)->get();
        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'category_id' => 9,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }



}
