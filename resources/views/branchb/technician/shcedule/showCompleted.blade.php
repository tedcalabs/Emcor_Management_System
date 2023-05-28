

@extends('branchb.technician.layouts.Tec_base')
@include('branchb.technician.components.topbar')
@include('branchb.technician.components.footer')
@include('branchb.technician.components.sidebar')

@section('ShowRequestC')

<div class="container">
    
    <div class="item item-25">
        <div class="col-8" style=" margin-bottom:10px">
            <span class="head" style="color: black;">Request Information</span>
        </div>
   
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Details</h5>
                <a href="{{ route('completed.sched.bywn') }}" class="close close-icon" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>NAME:</strong> {{ $data->name }}</li>
                            <li class="list-group-item"><strong>Address:</strong> {{ $data->house_no }}, {{ $data->purok }}, {{ $data->barangay }}, {{ $data->city_m }},  {{ $data->address }}</li>
                            <li class="list-group-item"><strong>Contact Number:</strong> {{ $data->phone }}</li>
                            <li class="list-group-item"><strong>Trouble:</strong> {{ $data->description }}</li>
                            <li class="list-group-item"><strong>Model:</strong> {{ $data->model }}</li>
                            <li class="list-group-item"><strong>Serial Number:</strong> {{ $data->serial_no }}</li>
                            <li class="list-group-item"><strong>Unit Description:</strong> {{ $data->unit_info }}</li>
                            <li class="list-group-item"><strong>Category:</strong> {{ $data->category }}</li>
                            <li class="list-group-item"><strong>Servicing Date:</strong>    {{ \Carbon\Carbon::parse($data->req_date)->format('d/m/Y g:i:s A')}} </li>
                            <li class="list-group-item"><strong>Expected Date of Completion:</strong>       {{ \Carbon\Carbon::parse($data->task_due_date)->format('d/m/Y g:i:s A')}}</li>
                            <li class="list-group-item"><strong>Date Completed:</strong> {{ $data->date_completed }}</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Warranty Status:</strong> {{ $data->w_stat }}</li>
                            <li class="list-group-item"><strong>Assessment:</strong> {{ $data->assessment }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

 @endsection
