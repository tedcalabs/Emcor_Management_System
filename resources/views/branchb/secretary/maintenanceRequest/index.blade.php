
@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')
@section('requestb')

<div class="container">
    <div class="item item-1">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
         
        <div class="" style=" margin-bottom:10px">
            
            <span class="head"> Request list</span>
           
            <a href="{{ route('acceptb') }}" class="btn btn-info" style="float:right">Acceted Request</a>


        </div>
     <div class="table-responsive">
         <table class="table table-bordered">
             <thead>
               <tr>
                   <th>Id</th>
                   <th>Name</th>
                   <th>Address</th>
                   <th>Contact Number</th>
                   <th>Request Detail</th>
                   <th>Date of Request</th>
                   <th>Action</th>
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
                   <td>{{ $data->created_at}}</td>
                   <td>
                       <div class=" ">
                           <a href="{{ route('updateReqb', $data->id) }}" class="btn btn-info" style="margin-bottom: 5px">Accept</a>
                           <form method="POST"
                                   action=""
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger">Decline</button>
                           
                       </form>

                       </div>

                   </td>
                   <td>
                    <div class=" ">
                        <a href="" class="btn btn-info "  style="margin-bottom: 5px">Edit</a>
                        <form method="GET"
                                action="{{ route('deleteReqb',$data->id) }}"
                                onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')

                        <button type="submit" class="btn btn-danger" style="margin-bottom: 5px">Delete</button>
                        
                    </form>

                    </div>

                </td>
               </tr>

            
               @endforeach
           </tbody>
         </table>
        </div>
        </div>
</div>
   
         @endsection