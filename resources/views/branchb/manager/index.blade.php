
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')


@section('managerDashboard')
        
<div class="container request4">
    <div class="item border-left-primary shadow  rounded total-request">All Request <br>{{ $total }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Request<br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Accepted Request<br>{{ $accepted }}</div>
    <div class="item border-left-primary shadow  rounded completed-request">Completed Request<br>{{ $completed}}</div>
    <div class="item border-left-primary shadow  rounded declined-request">Declined Request<br>{{ $declined}}</div> 
  </div>



@endsection