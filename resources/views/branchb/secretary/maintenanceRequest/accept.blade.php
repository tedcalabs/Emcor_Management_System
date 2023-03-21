@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')

@section('updateReqb')

<div class="container">
    <div class="item item-6">
    <div class="row">
    
        <div class="col">
            <div class="card">
                <div class="card-header font-bold text-2xl text-emerald-900">
               
                  <h2>Service Detail</h2>
                </div>
                <div class="card-body">
                
                    <form method="POST" action="{{ route('maintenanceb.update',$data->id)}}" enctype="multipart/form-data">
                      
                        @csrf
                        @method('PUT')


                          <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Choose Technician</label>  
                     
                        <select class="form-select"  id="technician" name="technician" aria-label="Default select example">
                            @foreach ($technician as $tech)
                            
                             <option value="{{$tech->name}}">{{$tech->name}}</option>
                             
                             @endforeach
                              </select>
                        </div>


                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                            <div class="mt-1">
                                <input type="text" id="name" name="name" value="{{ $data->name}}"
                                    class=" @error('name') border-red-400 @enderror" />
                                </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700"> Phone </label>
                            <div class="mt-1">
                                <input type="hidden" value="5" id="tech" name="tech">   
                                <input type="text" id="phone" name="phone" value="{{ $data->phone}}"

                                    class=" @error('name') border-red-400 @enderror" />
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Date</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="req_date"  name="req_date" > 
                               
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Address</label>
                            <div class="mt-1">
                                <input type="text" id="address" name="address" value="{{ $data->address}}"
                                    class=" @error('name') border-red-400 @enderror" />
                            </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                                <input type="text" id="description" name="description" value="{{ $data->description}}"
                                    class=" @error('name') border-red-400 @enderror" />
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
</div>
@endsection