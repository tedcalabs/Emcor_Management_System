

@extends('layouts.app')
@include('admin.components.topbar')
@include('components.sidebar')
@include('admin.components.footer')
@section('content')
        

<div class="container request3">
    <div class="item total-request3">Dumaguete Branch</div> 
  </div>
<div class="container request">
    <div class="item border-left-primary shadow  rounded total-request">All Request <br>{{ $total }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request">Pending Request<br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request">Accepted Request<br>{{ $accepted }}</div>
    <div class="item border-left-primary shadow  rounded completed-request">Completed Request<br>{{ $completed}}</div>
    <div class="item border-left-primary shadow  rounded declined-request">Declined Request<br>{{ $declined}}</div>
  </div>


@endsection









