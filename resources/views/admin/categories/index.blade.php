@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')

@section('categories')

<div class="container">
    <div class="item item-9">
        <div class="row">
            <div class="col-4" style="">
                <a href="{{ route('categories.create')}}" class="btn btn-primary edit-button" style="float:left">Create Category</a>
            </div>
            <div class="col-4" style="">
                <span class="head">Categories</span>
            </div>
            <div class="col-4" style="margin-bottom: 1rem; margin-left: 8rem; width:15rem; float:right;">
                <form action="{{ route('categories.index') }}" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search categories...">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
     
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Discription</th>
                        <th>Action</th>

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
                            <div class="">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info edit-button">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $category->id }}">
                                    Delete
                                </button>
                            </div>
                            <!-- Delete Category Modal -->
                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $category->id }}">Delete Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this category?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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