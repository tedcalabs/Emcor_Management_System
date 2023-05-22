@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.footer')
@include('admin.components.sidebar')
@section('categories')


<div class="container">
    <div class="item item-9">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h2>Edit Service</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('services.update', $service->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" id="name" name="name" value="{{ $service->name }}"
                                        class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <div>
                                        <img src="{{ Storage::url($service->image) }}" width="70px" height="70px" alt="Image">
                                    </div>
                                    <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" />
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="description" rows="3" name="description"
                                        class="form-control @error('description') is-invalid @enderror">{{ $service->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary float-end submit-button">Update</button>
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