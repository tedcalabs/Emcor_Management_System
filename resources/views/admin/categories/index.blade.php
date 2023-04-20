@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')


@section('categories')

<div class="container">
    <div class="item item-9">
        <div class="head">
            
            <span>Category</span>
        
        
            <a  href="{{ route('categories.create')}}" class="btn btn-info" style=" float:right ">Create Category</a>
        </div>
  
           

     
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Edit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->name}}</td>
                        {{-- <td>
                      <img src="{{ Storage::url($category->image) }}" width="70px" height="70px" alt="Image">
                        
                        </td> --}}
                        <td>{{ $category->description}}</td>


                        <td>

                            <div class=" ">
                                <a href="{{route('categories.edit', $category->id) }}" class="btn btn-info edit-button">Edit</a>
                                <form method="POST"
                                        action="{{ route('categories.destroy', $category->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                                
                            </form>

                            </div>

                        </td>
                    </tr>
                     
                  
                    @endforeach
                 
                    
                </tbody>
              </table>
            </div>
        </div>
    </div>
@endsection