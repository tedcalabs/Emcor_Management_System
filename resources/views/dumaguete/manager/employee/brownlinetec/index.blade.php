
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')


@section('emBl')
<div class="container">
  <div class="item item-9">
      <div class="head">Brownlines Technicians</div>

      
     
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
        </div>
    </div>

@endsection