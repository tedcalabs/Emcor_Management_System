@extends('layouts.app')
@include('components.sidebar')
@include('admin.components.topbar')
 @include('admin.components.footer')


@section('Scustomer')
<div class="container">
  <div class="item item-9">

    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('cuslist') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Customers</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('cuslist') }}">
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

          {{ $customers->links() }}
        </div>
    </div>

@endsection