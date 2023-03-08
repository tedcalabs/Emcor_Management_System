@extends('admin.admin_master')
@include('admin.index')
@section('categories')
<div class="table_area">
         <a  href="{{ route('categories.create')}}" class="btn btn-info " >Create Category</a>
     
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Discription</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->catname}}</td>
                        <td>
                      <img src="{{ Storage::url($category->image) }}" width="70px" height="70px" alt="Image">
                        
                        </td>
                        <td>{{ $category->description}}</td>


                        <td>

                            <div class=" ">
                                <a href="{{route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                <form method="POST"
                                        action="{{ route('categories.destroy', $category->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-red">Delete</button>
                                
                            </form>

                            </div>

                        </td>
                    </tr>
                     
                  
                    @endforeach
                 
                    
                </tbody>
              </table>
            </div>
        </div>
@endsection