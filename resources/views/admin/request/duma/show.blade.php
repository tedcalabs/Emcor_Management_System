
@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')


@section('ShowRequest')

<div class="container">
    <div class="item item-25">
        {{-- <div class="row">
            <div class="col-8" style=" margin-bottom:10px">
               
                    <span class="head" style="color: black;">Request Information    </span>
          
            </div>
        </div>
     <div class="table-responsive">
         <table class="table table-bordered">
             <thead>
               <tr>    
                <th style="position: relative;">
                    Details
                    <a href="{{ route('duma.mtnc.request') }}" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); cursor: pointer;" >&#10006;</a>
                  </th>
               </tr>
           </thead>
           <tbody> 
               <tr>
                   <td> <strong>NAME:</strong> {{ $data->name}}  <br>
                    <strong>Address:</strong>  {{ $data->address}} <br>
                    <strong>Contact Number:</strong> {{ $data->phone}} <br>  
                    <strong>Trouble:</strong>   {{ $data->description}} <br>
                    <strong>Model:</strong>   {{ $data->model}} <br>
                    <strong>Serial Number:</strong>   {{ $data->serial_no}} <br>
                    <strong>Unit Description:</strong>   {{ $data->unit_info}} <br>
                    <strong>Category:</strong>   {{ $data->category}} <br>
                    <strong>Servicing Date:</strong>   {{ $data->req_date}} <br>
                    <strong>Date Completed:</strong>   {{ $data->date_completed}} <br>
                    <strong>Assessment:</strong>   {{ $data->assessment}} <br>
                    <strong> Reference Number:</strong>&nbsp;&nbsp;{{ $data->reference_no}} <br>
                    <strong>Proof of Payment:</strong>&nbsp;&nbsp;<img src="{{ asset('uploads/proof/' . $data->image) }}" alt="Proof of Payment" width="220" height="300">
                </td>         
               </tr>
           </tbody>
         </table>
        </div> --}}

        <div class="col-8" style=" margin-bottom:10px">

            <span class="head" style="color: black;">Request Information</span>
           
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
                <a href="{{ route('duma.mtnc.request') }}" class="close close-icon" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="row">
                    @if ($data)
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>NAME:</strong> {{ $data->name }}</li>
                                <li class="list-group-item"><strong>Address:</strong> {{ $data->address }}</li>
                                <li class="list-group-item"><strong>Contact Number:</strong> {{ $data->phone }}</li>
                                <li class="list-group-item"><strong>Trouble:</strong> {{ $data->description }}</li>
                                <li class="list-group-item"><strong>Model:</strong> {{ $data->model }}</li>
                                <li class="list-group-item"><strong>Serial Number:</strong> {{ $data->serial_no }}</li>
                                <li class="list-group-item"><strong>Unit Description:</strong> {{ $data->unit_info }}</li>
                                <li class="list-group-item"><strong>Category:</strong> {{ $data->category }}</li>
                                <li class="list-group-item"><strong>Servicing Date:</strong> {{ $data->req_date }}</li>
                                <li class="list-group-item"><strong>Assigned Technician:</strong> {{ $data->technician_fname }} {{ $data->technician_lname }}</li>
                                <li class="list-group-item"><strong>Date Completed:</strong> {{ $data->date_completed }}</li>
                                <li class="list-group-item"><strong>Assessment:</strong> {{ $data->assessment }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Reference Number:</strong> {{ $data->reference_no }}</li>
                                <li class="list-group-item"><strong>Proof of Payment</strong> </li>
                            </ul>
                            <img src="{{ asset('uploads/proof/' . $data->image) }}" alt="Proof of Payment" class="img-fluid mt-3" width="190" height="300">
                        </div>
                    @else
                        <div class="col-md-12">
                            <p>No data found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        
        </div>
    </div>

 @endsection
