 @extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')

@include('admin.components.footer')

@section('adminDashboard')
<div class="container request3">
    <div class="item total-request3">Dumaguete Branch</div> 
  </div>
<div class="container request">
    <div class="item border-left-primary shadow  rounded total-request">  <br> All Request <br>{{ $total }}</div>
    <div class="item border-left-primary shadow  rounded  pending-request"> <br> Pending Request<br>{{ $pending }}</div>
    <div class="item border-left-primary shadow  rounded accepted-request"> <br> Accepted Request<br>{{ $accepted }}</div>
    <div class="item border-left-primary shadow  rounded completed-request"><br> Completed Request<br>{{ $completed}}</div>
    <div class="item border-left-primary shadow  rounded declined-request"> <br> Declined Request<br>{{ $declined}}</div>
  </div>
  <div class="container request3">
    <div class="item total-request4">Bayawan Branch</div> 
  </div>
  <div class="container request2">
    <div class="item border-left-primary shadow  rounded total-request2"><br> All Request <br>{{ $totalb}}</div>
    <div class="item border-left-primary shadow  rounded  pending-request2"> <br> Pending Request<br>{{ $pendingb}}</div>
    <div class="item border-left-primary shadow  rounded accepted-request2"><br> Accepted Request<br>{{ $acceptedb}}</div>
    <div class="item border-left-primary shadow  rounded completed-request2"> <br> Completed Request<br>{{ $completedb}}</div>
    <div class="item border-left-primary shadow  rounded declined-request2"> <br> Declined Request<br>{{ $declinedb}}</div> 
  </div>
@endsection
