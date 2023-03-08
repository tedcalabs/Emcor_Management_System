<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceStoreRequest;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Service::all();
        $categories = Category::all();
        return view('admin.services.index', compact('data', 'categories'));
    }

    /**
     * Show the form for creating a new resource.PPPppPP
     *
     * @return \Illuminate\Http\Response
     */
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
        $image = $request->file('image')->store('public/images');

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price

        ]);
        if ($request->has('categories')) {
            $service->categories()->attach($request->categories);
        }
        return to_route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $categories = Category::all();

        return view('admin.services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Storage::delete($service->image);
        $service->delete();

        return to_route('services.index');
    }





    public function get_popular_services(Request $request)
    {

        $list = Service::where('type_id', 1)->take(5)->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'type_id' => 1,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }

    public function get_recommended_services(Request $request)
    {

        $list = Service::where('type_id', 1)->take(4)->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
        }

        $data =  [
            'total_size' => $list->count(),
            'type_id' => 1,
            'offset' => 0,
            'products' => $list
        ];

        return response()->json($data, 200);
    }



    /*
    public function get_popular_services(Request $request)
    {


        //$students = Student::with('courses')->get();

        $list = Category::with('services')->whereHas('services', function ($query) {
            $query->where('catname', 'Brownlines');
        })->get();
        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] = $Content = preg_replace("/&#?[a-z0-9]+;/i", " ", $item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        $data =  [
            'total_size' => $item->count(),
            'services' => $item
        ];

        return response()->json($data, 200);
    }*/
}
