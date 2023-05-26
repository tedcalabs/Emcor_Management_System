
@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')
@include('branchb.secretary.components.footer')

@section('updateReqdecnd')

<div class="container">
    <div class="item item-6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title font-bold text-2xl text-emerald-900">Decline Request</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('bdecline', $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
        
                            
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
                                    <input type="hidden" value="2" id="acceptd" name="acceptd">
                                    <input type="hidden" value="declined" id="status" name="status">
                                    <input type="text" id="phone" name="phone" value="{{ $data->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror" />
                                    @error('phone')
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
                                <label for="description" class="col-sm-4 col-form-label">Request Detail</label>
                                <div class="col-sm-8">
                                    <input type="text" id="description" name="description" value="{{ $data->description }}"
                                        class="form-control @error('description') is-invalid @enderror" />
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="message" class="col-sm-4 col-form-label">Reason for Decline</label>
                                <div class="col-sm-8">
                                    <input type="text" id="message" name="message"
                                        class="form-control @error('message') is-invalid @enderror" />
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col">
                                    <button type="submit" class="btn btn-info float-end submit-button">Submit</button>
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