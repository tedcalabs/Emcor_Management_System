
@extends('branchb.manager.layouts.mngr_base')
@include('branchb.manager.components.topbar')
@include('branchb.manager.components.footer')
@include('branchb.manager.components.sidebar')


@section('emWork')
<div class="container">
  <div class="item item-9">

    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('workex.employees') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Work Expert</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('workex.employees') }}">
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
          {{ $wex->links() }}
        </div>
    </div>


@endsection