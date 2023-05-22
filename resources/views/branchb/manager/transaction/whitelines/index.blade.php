
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')


@section('whitetrans')
<div class="container">
  <div class="item item-9">
    <div class="row align-items-center">
      <div class="col-8">
            
     
          <div class="head">
            
            
            <a href="{{ route('whitelinesb.tansaction') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">  Whitelines Transactions</span>
          </a>
          
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('whitelinesb.tansaction') }}">
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
                      <th>Customers Name</th>
                      <th>Address</th>
                      <th>Servicing Date</th>
                      <th>Technician Assigned</th>
                  </tr>
              </thead>
              <tbody> 
    
                @foreach ($data as $wtrans)
                <tr>
                  <td>
                  
                      {{ $wtrans->id}} <br>
                     <a href="{{ route('BShowDumaRequestMW', $wtrans->id) }}"> <i class="fa-solid fa-book icons"  style="color: red;"></i></a><br>
                  </td>
                    <td>{{ $wtrans->name}}</td>
                    <td>{{ $wtrans->address}}</td>
                    <td>{{ $wtrans->reqdate}}</td>
                    <td>{{ $wtrans->technician}}</td>
                </tr>   
                @endforeach
               
                  
              </tbody>
            </table>
          </div>
          {{ $data->links() }}
        </div>
    </div>

@endsection