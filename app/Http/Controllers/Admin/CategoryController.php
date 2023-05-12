<?php

namespace App\Http\Controllers\Admin;


use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('q');
    
        if ($query) {
            $categories = Category::where('name', 'like', "%$query%")->get();
        } else {
            $categories = Category::all();
        }
    
        return view('admin.categories.index', compact('categories'));
    }
    

    public function create()
    {

        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        //$image = $request->file('image')->store('public/categories');

        Category::create([
            'name' => $request->name,
            'description' => $request->description,

        ]);

        return to_route('categories.index');
    }


    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'catname' => 'required',
                'description' => 'required'
            ]
        );


        $category->update([
            'name' => $request->catname,
            'description' => $request->description,
        ]);
        return to_route('categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('categories.index');
    }
}
