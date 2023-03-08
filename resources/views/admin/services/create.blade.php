@extends('admin.admin_master')
@include('admin.index')
@section('categories')


<div class= "contianer " style="margin-top: 1in; margin-left: 22rem; margin-right: 300px;">
    <div class="row">
    
        <div class="col">
            <div class="card">
                <div class="card-header">
               
                  <h2>New Services</h2>
                </div>
                <div class="card-body">
                 
                    <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="sm:col-span-6">
                            <label for="name" class=""> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                            <div class="mt-1">
                                <input type="file" id="image" name="image"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>
                            @error('image')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1">
                                <input type="number"  min="0.00" max="50000.00" step="0.01" id="price" name="price"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                            </div>
                            @error('image')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sm:col-span-6 pt-5">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <textarea id="description" rows="3" name="description"
                                    class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 @enderror"></textarea>
                            </div>
                            @error('description')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="sm:col-span-6 pt-5">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <div class="mt-1">
                                    <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->catname}}</option>
                                        @endforeach
                                </select>

                                </div>                       
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="btn btn-info  float-left bg-slate-400">Store</button>
                        </div>
                    </form>
               
                </div>
            </div>
        </div>
   
</div>
                
           

@endsection