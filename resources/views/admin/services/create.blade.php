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
                            <h2>New Services</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('services.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" />
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="image" class="form-label">Image</label>
                                        <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror" />
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" min="0.00" max="50000.00" step="0.01" id="price" name="price" class="form-control @error('price') is-invalid @enderror" />
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" rows="3" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <label for="category" class="form-label">Category</label>
                                        <select id="categories" name="categories[]" class="form-select" multiple>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">
                                        <button type="submit" class="btn btn-grey float-end submit-button">Store</button>
                                    </div>
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