
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')

@section('ShowRequestW')

<div class="container">
    
    <div class="item item-25">
        <div class="col-8" style=" margin-bottom:10px">

            <span class="head" style="color: black;">Request Information</span>
           
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
                <a href="{{ route('mechanicb.tansaction') }}" class="close close-icon" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>NAME:</strong> {{ $data->name }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $data->address }}</li>
                            <li class="list-group-item"><strong>Contact Number:</strong> {{ $data->phone }}</li>
                            <li class="list-group-item"><strong>Trouble:</strong> {{ $data->description }}</li>
                            <li class="list-group-item"><strong>Model:</strong> {{ $data->model }}</li>
                            <li class="list-group-item"><strong>Serial Number:</strong> {{ $data->serial_no }}</li>
                            <li class="list-group-item"><strong>Unit Description:</strong> {{ $data->unit_info }}</li>
                            <li class="list-group-item"><strong>Category:</strong> {{ $data->category }}</li>
                            <li class="list-group-item"><strong>Servicing Date:</strong> {{ $data->req_date }}</li>
                            <li class="list-group-item"><strong>Assigned Technician:</strong> {{ $data->technician_fname }} {{ $data->technician_lname }}</li>
                            <li class="list-group-item"><strong>Date Completed:</strong> {{ $data->date_completed }}</li>
                            <li class="list-group-item"><strong>Assessment:</strong> {{ $data->assessment }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Warranty Status:</strong> {{ $data->w_stat }}</li>
                            <li class="list-group-item"><strong>Payment Status:</strong> {{ $data->pay_stat }}</li>
                            <li class="list-group-item"><strong>Reference Number:</strong> {{ $data->reference_no }}</li>
                            <li class="list-group-item"><strong>Proof of Payment</strong> </li>
                        </ul>
                        <img src="{{ asset('uploads/proof/' . $data->image) }}" alt="Proof of Payment" class="img-fluid mt-3" width="190" height="300">

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

 @endsection
