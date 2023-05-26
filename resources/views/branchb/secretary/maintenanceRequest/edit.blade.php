
@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')
@include('branchb.secretary.components.footer')

@section('AcceptRequestWlb')

<div class="container">
    <div class="item item-6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-bold text-2xl text-emerald-900">Accept Request</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('maintenanceb.update',$data->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
        
                            <div class="row mb-3">
                                <label for="technician" class="col-sm-4 col-form-label">Choose Technician</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="technicianb_id" name="technicianb_id" aria-label="Choose Technician">
                                        @foreach ($technician as $tech)
                                            <option value=" {{ $tech->id}}">{{ $tech->fname }} {{ $tech->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" id="name" name="name" value="{{ $data->name }}"
                                        class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-4 col-form-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="hidden" value="1" id="acceptd" name="acceptd">
                                    <input type="hidden" value="pending" id="status" name="status">
                                    <input type="text" id="phone" name="phone" value="{{ $data->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror" />
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="req_date" class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                    <input type="datetime-local" id="req_date" name="req_date"
                                        class="form-control @error('req_date') is-invalid @enderror" />
                                    @error('req_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="address" class="col-sm-4 col-form-label">Address</label>
                                <div class="col-sm-8">
                                    <input type="text" id="address" name="address" value="{{ $data->address }}"
                                        class="form-control @error('address') is-invalid @enderror" />
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <input type="text" id="description" name="description" value="{{ $data->description }}"
                                        class="form-control @error('description') is-invalid @enderror" />
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary float-end submit-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>               
</div>  
</div>
@endsection