
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')


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