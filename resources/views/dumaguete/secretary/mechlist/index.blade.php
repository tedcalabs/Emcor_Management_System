@extends('layouts.app')
@include('components.sidebar')
@include('admin.components.topbar')
 @include('admin.components.footer')

@section('SemMec')
<div class="container">
  <div class="item item-9">

    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('mechanicS') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Mechanics</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('mechanicS') }}">
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
    
                  @foreach ($mec as $mechanic)
                  <tr>
                    <td>{{ $mechanic->id}}</td>
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
          {{ $mec->links() }}
        </div>
    </div>

@endsection