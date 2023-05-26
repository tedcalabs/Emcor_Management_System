
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.footer')
@include('dumaguete.manager.components.sidebar')


@section('managerDashboard')
        
<div class="container request4">
  <div class="item border-left-primary shadow  rounded total-request"> <br> <br>  All Request <br>{{ $total }}</div>
  <div class="item border-left-primary shadow  rounded  pending-request"> <br> <br> Pending Request<br>{{ $pending }}</div>
  <div class="item border-left-primary shadow  rounded accepted-request"> <br> <br> Accepted Request<br>{{ $accepted }}</div>
</div>

      
<div class="container request7">
  <div class="item border-left-primary shadow  rounded completed-request"> <br> <br> Completed Request<br>{{ $completed}}</div>
  <div class="item border-left-primary shadow  rounded declined-request"> <br> <br> Declined Request<br>{{ $declined}}</div> 
</div>



@endsection