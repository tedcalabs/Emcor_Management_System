@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')

@include('admin.components.footer')

@section('adminDashboard')
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
  <div class="container request3">
    <div class="item total-request4">Bayawan Branch</div> 
  </div>
  <div class="container request2">
    <div class="item border-left-primary shadow  rounded total-request2">All Request <br>{{ $totalb}}</div>
    <div class="item border-left-primary shadow  rounded  pending-request2">Pending Request<br>{{ $pendingb}}</div>
    <div class="item border-left-primary shadow  rounded accepted-request2">Accepted Request<br>{{ $acceptedb}}</div>
    <div class="item border-left-primary shadow  rounded completed-request2">Completed Request<br>{{ $completedb}}</div>
    <div class="item border-left-primary shadow  rounded declined-request2">Declined Request<br>{{ $declinedb}}</div> 
  </div>
@endsection
