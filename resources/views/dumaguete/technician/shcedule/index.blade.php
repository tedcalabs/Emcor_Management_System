

@extends('dumaguete.technician.layouts.tech_base')
@include('dumaguete.technician.components.topbar')
@include('dumaguete.technician.components.sidebar')

@section('schedule')
<div class="container">
    <div class="item item-5">
        <div class="head">Maintenance Request</div>

        
       
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
                   <th>Servicing Schedule</th>
                   <th>Assigned Technician</th>
                   <th>Action</th>
                   

               </tr>
           </thead>
           <tbody> 
            @foreach ($data as $mreq)
               <tr>
                   <td>{{ $mreq->id}}</td>
                   <td>{{ $mreq->name}}</td>
                   <td>{{ $mreq->address}}</td>
              
                   <td>{{ $mreq->phone}}</td>
                
                   <td>{{ $mreq->description}}</td>
                   <td>{{ $mreq->req_date}}</td>
                   <td>{{ $mreq->technician}}</td>
            
                   <td>
                       <div class=" ">
                           <a href="{{ route('updateD', $mreq->id) }}" class="btn btn-info"  style="margin-bottom: 5px">Update</a>
                           <form method="POST"
                                   action=""
                                   onsubmit="return confirm('Are you sure?');">
                               @csrf    
                               @method('DELETE')

                           <button type="submit" class="btn btn-danger text-black">Delete</button>
                           
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

@section('script')

    <script type="text/javascript">
        $(document).ready(function(){

            showRepair();

            function showRepair(){
           
            }
        })



    </script>

@endsection
