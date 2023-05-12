
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.footer')
@include('dumaguete.manager.components.sidebar')


@section('managerDashboard')
        
<div class="container request4">
    <div class="item border-left-primary shadow  rounded total-request">All Request <br>{{ $total }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Request<br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Accepted Request<br>{{ $accepted }}</div>
    <div class="item border-left-primary shadow  rounded completed-request">Completed Request<br>{{ $completed}}</div>
    <div class="item border-left-primary shadow  rounded declined-request">Declined Request<br>{{ $declined}}</div> 
  </div>



@endsection