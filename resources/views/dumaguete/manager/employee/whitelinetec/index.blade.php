
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('emWl')
        
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
    
                  @foreach ($wtec as $whitec)
                  <tr>
                      <td>{{ $whitec->fname}}</td>
                      <td>{{ $whitec->lname}}</td>
                      <td>{{ $whitec->address}}</td>
                      <td>{{ $whitec->gender}}</td>
                      <td>{{ $whitec->bdate}}</td>
                      <td>{{ $whitec->phone}}</td>
                      <td>{{$whitec->email}}</td>
                      <td>   @if ($whitec->status === 1)
                        <span class="act">Active</span>
                      @elseif ($whitec->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$whitec->status}}</span>
                      @endif</td>
                  </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
        </div>
    </div>



@endsection