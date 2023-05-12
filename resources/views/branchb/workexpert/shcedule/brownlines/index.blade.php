

@extends('branchb.workexpert.layouts.workExpert_base')
@include('branchb.workexpert.components.topbar')
@include('branchb.workexpert.components.footer')
@include('branchb.workexpert.components.sidebar')
@section('requestblw')

<div class="container">
    <div class="container">
        <div class="item item-19">
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
    
                       <th>Name</th>
                       <th>Address</th>
                       <th>Contact Number</th>
                       <th>Request Detail</th>
                       <th>Servicing Schedule</th>  
                       <th>Assigned Technician </th>
                       
    
                   </tr>
               </thead>
               <tbody> 
                @foreach ($data as $mreq)
                   <tr>
         
                       <td>{{ $mreq->name}}</td>
                       <td>{{ $mreq->address}}</td>
                  
                       <td>{{ $mreq->phone}}</td>
                    
                       <td>{{ $mreq->description}}</td>
                       <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                       <td>
                        {{ $mreq->technician}}
    
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