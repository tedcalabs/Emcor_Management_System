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
                <div class="card-header font-bold text-2xl text-emerald-900">
               
                  <h2>Decline Service Request</h2>
                </div>
                <div class="card-body">
                
                    <form method="POST" action="{{ route('decline',$data->id)}} " enctype="multipart/form-data">
                      
                        @csrf
                        @method('PUT')
                   
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Decline detail</label>
                            <div class="mt-1">
                                <input type="hidden" value="2" id="acceptd" name="acceptd">
                                <input type="hidden" value="{{ $data->status}}" id="status" name="status"> 
                                    <textarea type="text" id="message" name="message" value="{{ $data->message}}"
                                        class="" @error('name')@enderror"></textarea>
                                    </div>
                            @error('name')
                                <div class="text-sm text-red-400">{{ $message }}</div>  
                            @enderror
                        </div>
                   
               
                      
                     
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="btn btn-danger  float-left bg-slate-400">Decline</button>
                        </div>

                        
                    </form>
               
                </div>
            </div>
        </div>
   
</div>
                
</div>  
</div>
@endsection