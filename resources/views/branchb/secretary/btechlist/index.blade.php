@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.sidebar')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.footer')


@section('SemBl')
<div class="container">
  <div class="item item-9">


    <div class="row align-items-center">
      <div class="col-8">        
          <div class="head">
            <a href="{{ route('brownlinestecSb') }}" style="text-decoration: none;">
              <span class="head" style="color: black;">Brownlines Technicians</span>
          </a>
          </div>
      </div>
      <div class="col-4">
          <form method="GET" action="{{ route('brownlinestecSb') }}">
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
    
                  @foreach ($wbl as $bltec)
                  <tr>
                      <td>{{ $bltec->fname}}</td>
                      <td>{{ $bltec->lname}}</td>
                      <td>{{ $bltec->address}}</td>
                      <td>{{ $bltec->gender}}</td>
                      <td>{{ $bltec->bdate}}</td>
                      <td>{{ $bltec->phone}}</td>
                      <td>{{$bltec->email}}</td>
                      <td>   @if ($bltec->status === 1)
                        <span class="act">Active</span>
                      @elseif ($bltec->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$bltec ->status}}</span>
                      @endif</td>
                  </tr>
                   
                
                  @endforeach
               
                  
              </tbody>
            </table>
          </div>
          {{ $wbl->links() }}
        </div>
    </div>

@endsection