

@extends('layouts.app')
    
    @include('components.topbar')
    @include('components.sidebar')
@section('request')

<div class="container">
    <div class="item item-5">
        <div class="" style=" margin-bottom:10px">
            
            <span class="head">Accepted Request list</span>
           
            <a href="{{ route('mreq') }}" class="btn btn-info float-right" style="">Back</a>


        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
     <div class="table-responsive">
 
         <table class="table table-bordered">
             <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Address</th>
                   <th>Contact Number</th>
                   <th>Request Detail</th>
                   <th>Schedule</th>   
                   <th>Status</th>
                                   
                   <th>Edit</th>

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $data)
               <tr>
                   <td>{{ $data->id}}</td>
                   <td>{{ $data->name}}</td>
                   <td>{{ $data->address}}</td>
              
                   <td>{{ $data->phone}}</td>
                
                   <td>{{ $data->description}}</td>
                   <td>{{ $data->req_date}}</td>
                   <td>{{ $data->status}}</td>
                   <td>
                    <div class=" ">
                        <a href="{{ route('updateReq', $data->id) }}" class="btn btn-info "  style="margin-bottom: 5px">Edit</a>
                        <form method="GET"
                                action="{{ route('deleteReq', $data->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-danger text-black" style="margin-bottom: 5px">Delete</button>
                        
                    </form>

                    </div>

                </td>
               </tr>

            
               @endforeach
           </tbody>
         </table>
   
        </div>
        </div>
 @endsection

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){

            showRepair();

            function showRepair(){
           
            }
        })



    </script>

@endsection