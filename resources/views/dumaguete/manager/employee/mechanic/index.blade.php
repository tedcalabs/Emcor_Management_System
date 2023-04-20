
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('emMec')
<div class="container">
  <div class="item item-9">
      <div class="head">Mechanics</div>

      
     
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
    
                  @foreach ($mec as $mechanic)
                  <tr>
                      <td>{{ $mechanic->fname}}</td>
                      <td>{{ $mechanic->lname}}</td>
                      <td>{{ $mechanic->address}}</td>
                      <td>{{ $mechanic->gender}}</td>
                      <td>{{ $mechanic->bdate}}</td>
                      <td>{{ $mechanic->phone}}</td>
                      <td>{{$mechanic->email}}</td>
                      <td>   @if ($mechanic->status === 1)
                        <span class="act">Active</span>
                      @elseif ($mechanic->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$mechanic ->status}}</span>
                      @endif</td>
                  </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
        </div>
    </div>

@endsection