

@extends('branchb.technician.layouts.Tec_base')
@include('branchb.technician.components.topbar')
@include('branchb.technician.components.footer')
@include('branchb.technician.components.sidebar')
@section('contentBt')
        
<div class="container request5">
   <div class="item total-request5"></div> 
 </div>
<div class="container request5">
   <div class="item border-left-primary shadow  rounded total-request">All Schedules<br> <br>{{ $allsched }}</div>
   <div class="item border-left-primary shadow  rounded  pending-request">Pending Schedules<br> <br>{{ $pending }}</div>
   <div class="item border-left-primary shadow  rounded accepted-request">Completed Services<br> <br>{{ $completed}}</div>
 </div>


@endsection



 


