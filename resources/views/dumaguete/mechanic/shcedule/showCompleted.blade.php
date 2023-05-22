@extends('dumaguete.mechanic.layouts.mechanic_base')
@include('dumaguete.mechanic.components.topbar')
@include('dumaguete.mechanic.components.footer')
@include('dumaguete.mechanic.components.sidebar')

@section('ShowRequestC')

<div class="container">
    
    <div class="item item-25">
        <div class="col-8" style=" margin-bottom:10px">
            <span class="head" style="color: black;">Request Information</span>
        </div>
     <div class="table-responsive">
 
         <table class="table table-bordered">
             <thead>
               <tr>
                <th style="position: relative;">
                    Details
                    <a href="{{ route('completed.sched.mec') }}" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); cursor: pointer;" >&#10006;</a>
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
        </div>
        </div>
    </div>

 @endsection
