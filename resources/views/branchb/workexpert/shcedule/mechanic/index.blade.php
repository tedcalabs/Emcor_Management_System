

@extends('branchb.workexpert.layouts.workExpert_base')
@include('branchb.workexpert.components.topbar')
@include('branchb.workexpert.components.footer')
@include('branchb.workexpert.components.sidebar')
@section('requestwlwx')

<div class="container">
    <div class="container">
        <div class="item item-19">
            <div class="row align-items-center">
                <div class="col-8">        
                    <div class="head">
                      <a href="{{ route('getMechanicb.request') }}" style="text-decoration: none;">
                        <span class="head" style="color: black;" >Mechanic Maintenance Request</span>
                    </a>
                    </div>
                </div>
                <div class="col-4">
                    <form method="GET" action="{{ route('workexpertb.sched') }}">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
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
                       <th>Servicing Schedule</th>  
                       <th>Assigned Technician </th>
                       
    
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
                       <td>{{ \Carbon\Carbon::parse($mreq->req_date)->format('d/m/Y g:i:s A')}}</td>
                      
                        <td>{{ $mreq->technician_fname }} {{ $mreq->technician_lname }}</td>
    
                      
                      
                   </tr>
    
                
                   @endforeach
               </tbody>
             </table>
       
            </div>
            </div>
        </div>
 @endsection
