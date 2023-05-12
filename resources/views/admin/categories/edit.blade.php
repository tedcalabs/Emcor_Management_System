@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.footer')
@include('admin.components.sidebar')
@section('categories')

<div class="container">
    <div class="item item-9">
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h2>Edit Category</h2>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                        <label for="catname" class="form-label">Name</label>
                        <input type="text" id="catname" name="catename" value="{{ $category->catname }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" rows="3" name="description" class="form-control @error('description') is-invalid @enderror">{{ $category->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mt-4">
                        <button type="submit" class="btn btn-info">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
</div>
   
</div>               
           

@endsection