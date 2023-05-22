@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')

@section('updateReqD')

<div class="container">
    <div class="item item-6">
       
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <h2 class="card-title font-bold text-2xl text-emerald-900">Edit Service Request</h2>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('upReqBx', $data->id) }}" enctype="multipart/form-data">
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
                      
                        <input type="text" id="phone" name="phone" value="{{ $data->phone }}" class="form-control @error('phone') is-invalid  @enderror" />
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="address" class="col-sm-4 col-form-label">Address</label>
                      <div class="col-sm-8">
                        <input type="text" id="address" name="address" value="{{ $data->address }}" class="form-control @error('address') is-invalid  @enderror" />
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="model" class="col-sm-4 col-form-label">Model</label>
                      <div class="col-sm-8">
                        <input type="text" id="model" name="model" value="{{ $data->model }}" class="form-control @error('model') is-invalid  @enderror" />
                        @error('model')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="serial_no" class="col-sm-4 col-form-label">Serial Number</label>
                      <div class="col-sm-8">
                        <input type="text" id="serial_no" name="serial_no" value="{{ $data->serial_no }}" class="form-control @error('serial_no') is-invalid  @enderror" />
                        @error('serial_no')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="unit_info" class="col-sm-4 col-form-label">Unit Description</label>
                      <div class="col-sm-8">
                        <input type="text" id="unit_info" name="unit_info" value="{{ $data->unit_info }}" class="form-control @error('unit_info') is-invalid  @enderror" />
                        @error('unit_info')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    
                    <div class="mb-3 row">
                      <label for="req_date" class="col-sm-4 col-form-label">Date of servicing</label>
                      <div class="col-sm-8">
                        <input type="datetime-local" id="req_date" name="req_date" class="form-control" value="{{ $data->req_date }}" />
                      </div>
                    </div>
                  
                    <div class="mb-3 row">
                      <label for="description" class="col-sm-4 col-form-label">Trouble</label>
                      <div class="col-sm-8">
                        <input type="text" id="description" name="description" value="{{ $data->description }}" class="form-control @error('description') is-invalid  @enderror" />
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="mt-6 p-4">
                      <button type="submit" class="btn btn-primary  float-end submit-button ">Submit</button>
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