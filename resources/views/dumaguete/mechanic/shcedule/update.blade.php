@extends('dumaguete.mechanic.layouts.mechanic_base')
@include('dumaguete.mechanic.components.topbar')
@include('dumaguete.mechanic.components.footer')
@include('dumaguete.mechanic.components.sidebar')
@section('updateReqM')
{{-- 
<div class="container">
    <div class="item item-6">
    <div class="row">
    
        <div class="col">
            <div class="card">
                <div class="card-header font-bold text-2xl text-emerald-900">
               
                  <h2>Update Status</h2>
                </div>
                <div class="card-body">
                
                    <form method="POST" action=" {{ route('maintenancesm.update',$data->id)}}" enctype="multipart/form-data">
                      
                        @csrf
                        @method('PUT')


                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <textarea type="text" id="status" name="status" value="{{ $data->status}}"
                                    class="" @error('name')@enderror"></textarea>
                                </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="btn btn-info  float-left bg-slate-400">Accept</button>
                        </div>

                        
                    </form>
               
                </div>
            </div>
        </div>
   
</div>
                
</div>  
</div> --}}


<div class="container">
    <div class="item item-20">
        <div class="card edit-info">
            <div class="card-header u_info">
                <span>Update Status</span>
                <a href="{{ route('mec.sched') }}" class="close_bot">Close</a>
            </div>
        
            <form method="POST" action="{{ route('maintenancesm.update',$data->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="row">
                        <div class="col-4 form-group">
                            <label for="name" class="form-label">Customer Name</label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $data->name}}"
                                       class="form-control @error('name') is-invalid @enderror" />
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 form-group">
                            <label for="address" class="form-label">Customer Address</label>
                            <div class="mt-1">
                                <input type="text" id="address" name="address" value="{{ $data->address}}"
                                       class="form-control @error('address') is-invalid @enderror" />
                            </div>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 form-group">
                            <label for="phone" class="form-label">Customer Phone Number</label>
                            <div class="mt-1">
                                <input type="phone" id="phone" name="phone" value="{{ $data->phone}}"
                                       class="form-control @error('phone') is-invalid @enderror" />
                            </div>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4 form-group">
                        <label for="model" class="form-label">Unit/Model</label>
                        <div class="mt-1">
                            <input type="text" id="model" name="model" value="{{$data->model}}"
                                   class="form-control @error('model') is-invalid @enderror" />
                        </div>
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4 form-group">
                        <label for="serial_no" class="form-label">Serial Number</label>
                        <div class="mt-1">
                            <input type="text" id="serial_no" name="serial_no" value="{{$data->serial_no}}"
                                   class="form-control @error('serial_no') is-invalid @enderror" />
                        </div>
                        @error('serial_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4 form-group">
                        <label for="unit_info" class="form-label">Unit Description</label>
                        <div class="mt-1">
                            <input type="text" id="unit_info" name="unit_info" value="{{$data->unit_info}}"
                                   class="form-control @error('unit_info') is-invalid @enderror" />
                        </div>
                        @error('unit_info')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <label for="description" class="form-label">Trouble</label>
                        <div class="mt-1">
                            <input type="hidden" value="completed" id="status" name="status">
                            <input type="text" id="description" name="description" value="{{$data->description}}"
                                   class="form-control @error('description') is-invalid @enderror" />
                        </div>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">

           
                    <div class="col-4 form-group">
                        <label for="req_date" class="form-label">Servicing Date</label>
                        <div class="mt-1">
                            <input type="req_date" id="req_date" name="req_date" value="{{ \Carbon\Carbon::parse($data->req_date)->format('d/m/Y g:i:s A')}}"
                                   class="form-control @error('req_date') is-invalid @enderror" />
                        </div>
                        @error('req_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4 form-group">
                        <label for="date_completed" class="form-label">Date Completed</label>
                        <div class="mt-1">
                            <input type="datetime-local" id="date_completed" name="date_completed" value=""
                                   class="form-control @error('date_completed') is-invalid @enderror" />
                        </div>
                        @error('date_completed')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="assessment" class="form-label">Assessment</label>
                            <div class="mt-1">
                                <textarea id="assessment" name="assessment" class="form-control @error('assessment') is-invalid @enderror" rows="4" ></textarea>
                            </div>
                            @error('assessment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                
                    <div class="card-button">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
                        
</div>  
</div>
@endsection