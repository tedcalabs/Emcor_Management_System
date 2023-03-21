
@extends('dumaguete.technician.layouts.tech_base')
@include('dumaguete.technician.components.topbar')
@include('dumaguete.technician.components.sidebar')

@section('updateReq')

<div class="container">
    <div class="item item-6">
    <div class="row">
    
        <div class="col">
            <div class="card">
                <div class="card-header font-bold text-2xl text-emerald-900">
               
                  <h2>Update Status</h2>
                </div>
                <div class="card-body">
                
                    <form method="POST" action=" {{ route('maintenances.update',$data->id)}}" enctype="multipart/form-data">
                      
                        @csrf
                        @method('PUT')


                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <input type="text" id="status" name="status" value="{{ $data->status}}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
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