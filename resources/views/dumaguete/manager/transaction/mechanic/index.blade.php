
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.footer')
@include('dumaguete.manager.components.sidebar')


@section('mectrans')
<div class="container">
  <div class="item item-9">
    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('mechanic.tansaction') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Mechanic Transactions</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('mechanic.tansaction') }}">
              <div class="input-group">
                  <input type="text" name="search" class="form-control" placeholder="Search...">
                  <button class="btn btn-outline-secondary" type="submit">Search</button>
              </div>
          </form>
      </div>
  </div>
  
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{ $message }}</p>
      </div>
      @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Customers Name</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Request Detail</th>
                    <th>Technician Assigned</th>
                    <th>Servicing Date</th>
                    <th>Date Completed</th>
                    <th>Assesment</th>
                  </tr>
              </thead>
              <tbody> 
    
                  @foreach ($data as $mectrans)
                  <tr>
                    <td>{{ $mectrans->name}}</td>
                    <td>{{ $mectrans->address}}</td>
                    <td>{{ $mectrans->phone}}</td>
                    <td>{{ $mectrans->description}}</td>
                    <td>{{ $mectrans->technician}}</td>
                    <td>{{ $mectrans->req_date}}</td>
                    <td>{{ $mectrans->date_completed}}</td>
                    <td>{{$mectrans->assessment}}</td>
                </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
          {{ $data->links() }}
        </div>
    </div>

@endsection