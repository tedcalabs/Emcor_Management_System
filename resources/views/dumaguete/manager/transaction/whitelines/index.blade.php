
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('whitetrans')
<div class="container">
  <div class="item item-9">
      <div class="head">Whitelines Transactions</div>
    
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