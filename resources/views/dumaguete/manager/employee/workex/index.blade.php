
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('emWork')
<div class="container">
  <div class="item item-9">
      <div class="head">Whitelines Technicians</div>

      
     
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
      <p>{{ $message }}</p>
      </div>
      @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                  <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Address</th>
                      <th>Gender</th>
                      <th>Birthday</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Status</th>

                  </tr>
              </thead>
              <tbody> 
    
                  @foreach ($wex as $workex)
                  <tr>
                      <td>{{ $workex->fname}}</td>
                      <td>{{ $workex->lname}}</td>
                      <td>{{ $workex->address}}</td>
                      <td>{{ $workex->gender}}</td>
                      <td>{{ $workex->bdate}}</td>
                      <td>{{ $workex->phone}}</td>
                      <td>{{$workex->email}}</td>
                      <td>   @if ($workex->status === 1)
                        <span class="act">Active</span>
                      @elseif ($workex->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$workex->status}}</span>
                      @endif</td>
                  </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
        </div>
    </div>


@endsection