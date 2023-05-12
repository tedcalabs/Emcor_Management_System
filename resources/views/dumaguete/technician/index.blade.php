

@extends('dumaguete.technician.layouts.tech_base')
@include('dumaguete.technician.components.topbar')
@include('dumaguete.technician.components.footer')
@include('dumaguete.technician.components.sidebar')


@section('contentT')
        
        
<div class="container request5">
    <div class="item total-request5"></div> 
  </div>
<div class="container request5">
    <div class="item border-left-primary shadow  rounded total-request">All Schedules<br> <br>{{ $allsched }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Schedules<br> <br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Completed Schedules<br> <br>{{ $completed}}</div>
  </div>


@endsection









