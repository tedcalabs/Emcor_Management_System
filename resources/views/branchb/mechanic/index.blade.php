
@extends('branchb.mechanic.layouts.mechanic_base')
@include('branchb.mechanic.components.topbar')
@include('branchb.mechanic.components.footer')
@include('branchb.mechanic.components.sidebar')


@section('mechanicDashboard')
        
<div class="container request5">
    <div class="item total-request5"></div> 
  </div>
<div class="container request5">
    <div class="item border-left-primary shadow  rounded total-request">All Schedules<br> <br>{{ $allsched }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Schedules<br> <br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Completed Schedules<br> <br>{{ $completed}}</div>
  </div>


@endsection