
@extends('dumaguete.workexpert.layouts.workExpert_base')
@include('dumaguete.workexpert.components.topbar')
@include('dumaguete.workexpert.components.footer')
@include('dumaguete.workexpert.components.sidebar')


@section('WexpertDashboard')
        
       
<div class="container request5">
    <div class="item total-request5"></div> 
  </div>
<div class="container request5">
    <div class="item border-left-primary shadow  rounded total-request">All Schedules<br> <br></div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Schedules<br> <br></div>
    <div class="item border-left-primary shadow  rounded accepted-request">Completed Schedules<br> <br></div>
  </div>


@endsection