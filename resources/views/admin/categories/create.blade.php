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
                    <h2>Create Category</h2>
                  </div>
                  <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" rows="3" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end submit-button">Store</button>
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