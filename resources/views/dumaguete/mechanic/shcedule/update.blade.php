@extends('dumaguete.mechanic.layouts.mechanic_base')
@include('dumaguete.mechanic.components.topbar')
@include('dumaguete.mechanic.components.sidebar')
@section('updateReqM')

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
</div>
@endsection