
@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')


@section('ShowRequestW')

<div class="container">
    <div class="item item-25">
        <div class="row">
            <div class="col-8" style=" margin-bottom:10px">
               
                    <span class="head" style="color: black;">Service Detail</span>
          
            </div>
        </div>
     
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Information</h5>
                <a href="{{ route('services.index') }}" class="close close-icon" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Service Name: </strong> {{ $data->name }}</li>
                            <li class="list-group-item"><strong>Description: </strong> {{ $data->description }}</li>
                         
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong></strong></li>
                        </ul>
                        <img src="{{  asset('uploads/services/'.$data->image) }}" alt="Proof of Payment" class="img-fluid mt-3" width="400" height="300">

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

 @endsection
