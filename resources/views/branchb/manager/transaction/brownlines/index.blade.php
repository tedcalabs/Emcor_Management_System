
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')


@section('browntrans')
<div class="container">
  <div class="item item-9">
    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('brownlines.tansaction') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Browlines Transactions</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('brownlines.tansaction') }}">
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
  
                @foreach ($data as $wtrans)
                <tr>
                    <td>{{ $wtrans->name}}</td>
                    <td>{{ $wtrans->address}}</td>
                    <td>{{ $wtrans->phone}}</td>
                    <td>{{ $wtrans->description}}</td>
                    <td>{{ $wtrans->technician}}</td>
                    <td>{{ $wtrans->req_date}}</td>
                    <td>{{ $wtrans->date_completed}}</td>
                    <td>{{$wtrans->assessment}}</td>
                </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
          {{ $data->links() }}
        </div>
    </div>

@endsection