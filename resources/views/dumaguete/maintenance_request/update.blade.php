@extends('layouts.app')
@include('admin.components.topbar')
 @include('admin.components.footer')
@include('components.sidebar')

@section('updateReq')

<div class="container">
    <div class="item item-6">
   
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-title font-bold text-2xl text-emerald-900">Edit Service Request</h2>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('updateX', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                      <label for="name" class="col-sm-4 col-form-label">Name</label>
                      <div class="col-sm-8">
                        <input type="text" id="name" name="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                      <div class="col-sm-8">
                        <input type="hidden" value="{{ $data->acceptd }}" id="acceptd" name="acceptd">
                        <input type="hidden" value="{{ $data->status }}" id="status" name="status">
                        <input type="text" id="phone" name="phone" value="{{ $data->phone }}" class="form-control @error('phone') is-invalid  @enderror" />
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="house_no" class="col-sm-4 col-form-label">House Number</label>
                      <div class="col-sm-8">
                        <input type="text" id="house_no" name="house_no" value="{{ $data->house_no }}" class="form-control @error('house_no') is-invalid  @enderror" />
                        @error('house_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="purok" class="col-sm-4 col-form-label">Purok/street</label>
                      <div class="col-sm-8">
                        <input type="text" id="purok" name="purok" value="{{ $data->purok }}" class="form-control @error('purok') is-invalid  @enderror" />
                        @error('purok')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="barangay" class="col-sm-4 col-form-label">Barangay</label>
                      <div class="col-sm-8">
                        <input type="text" id="barangay" name="barangay" value="{{ $data->barangay }}" class="form-control @error('barangay') is-invalid  @enderror" />
                        @error('barangay')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="city_m" class="col-sm-4 col-form-label">City/Municipality</label>
                      <div class="col-sm-8">
                        <input type="text" id="city_m" name="city_m" value="{{ $data->city_m }}" class="form-control @error('city_m') is-invalid  @enderror" />
                        @error('city_m')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="address" class="col-sm-4 col-form-label">Province</label>
                      <div class="col-sm-8">
                        <input type="text" id="address" name="address" value="{{ $data->address }}" class="form-control @error('address') is-invalid  @enderror" />
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="description" class="col-sm-4 col-form-label">Description</label>
                      <div class="col-sm-8">
                        <input type="text" id="description" name="description" value="{{ $data->description }}" class="form-control @error('description') is-invalid  @enderror" />
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mt-6 p-4">
                      <button type="submit" class="btn btn-info float-end submit-button">Update</button>
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