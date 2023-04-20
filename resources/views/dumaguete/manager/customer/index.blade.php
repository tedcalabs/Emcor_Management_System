
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('customer')
<div class="container">
  <div class="item item-9">
      <div class="head">Customers</div>

      
     
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

                  </tr>
              </thead>
              <tbody> 
    
                  @foreach ($customers as $customer)
                  <tr>
                      <td>{{ $customer->fname}}</td>
                      <td>{{ $customer->lname}}</td>
                      <td>{{ $customer->address}}</td>
                      <td>{{ $customer->gender}}</td>
                      <td>{{ $customer->bdate}}</td>
                      <td>{{ $customer->phone}}</td>
                      <td>{{$customer->email}}</td>
                  </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
        </div>
    </div>

@endsection