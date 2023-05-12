

@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.sidebar')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.footer')
@section('contentbs')

    <div class="container request3">
        <div class="item total-request3">Bayawan Branch</div> 
      </div>
    <div class="container request">
        <div class="item border-left-primary shadow  rounded total-request">All Request <br>{{ $total }}</div>
        <div class="item border-left-primary shadow  rounded  pending-request">Pending Request<br>{{ $pending }}</div>
        <div class="item border-left-primary shadow  rounded accepted-request">Accepted Request<br>{{ $accepted }}</div>
        <div class="item border-left-primary shadow  rounded completed-request">Completed Request<br>{{ $completed}}</div>
        <div class="item border-left-primary shadow  rounded declined-request">Declined Request<br>{{ $declined}}</div>
      </div>


@endsection



 


