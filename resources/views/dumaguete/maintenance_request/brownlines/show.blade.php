
@extends('layouts.app')
@include('components.sidebar')
@include('admin.components.topbar')
 @include('admin.components.footer')


@section('ShowRequestWzd')

<div class="container">
    <div class="item item-25">
        <div class="row">
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
                    <a href="{{ route('brownlines.req') }}" style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); cursor: pointer;" >&#10006;</a>
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
                </td>         
               </tr>
           </tbody>
         </table>
        </div>
        </div>
    </div>

 @endsection
