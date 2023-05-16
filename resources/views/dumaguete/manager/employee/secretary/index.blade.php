
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.footer')
@include('dumaguete.manager.components.sidebar')


@section('emSec')
        
<div class="container">
  <div class="item item-9">

    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('secretary.employees') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Secretaries</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('secretary.employees') }}">
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
                    <th>Id</th>
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
    
                  @foreach ($secretaries as $sec)
                  <tr>
                    <td>{{ $sec->Id}}</td>
                      <td>{{ $sec->fname}}</td>
                      <td>{{ $sec->lname}}</td>
                      <td>{{ $sec->address}}</td>
                      <td>{{ $sec->gender}}</td>
                      <td>{{ $sec->bdate}}</td>
                      <td>{{ $sec->phone}}</td>
                      <td>{{$sec->email}}</td>
                      <td>   @if ($sec->status === 1)
                        <span class="act">Active</span>
                      @elseif ($sec->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$sec->status}}</span>
                      @endif</td>
                  </tr>
                   
                
                  @endforeach
              
                  
              </tbody>
            </table>
          </div>
          {{ $secretaries->links() }}
        </div>
    </div>


@endsection