

@extends('branchb.workexpert.layouts.workExpert_base')
@include('branchb.workexpert.components.topbar')
@include('branchb.workexpert.components.footer')
@include('branchb.workexpert.components.sidebar')


@section('WexpertDashboard')

<div class="container request5">
    <div class="item total-request5"></div> 
  </div>
<div class="container request5">
    <div class="item border-left-primary shadow  rounded total-request">All Technician and Mechanic Schedules<br> <br>{{ $allsched }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Schedules<br> <br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Completed Services<br> <br>{{ $completed}}</div>
  </div>




@endsection