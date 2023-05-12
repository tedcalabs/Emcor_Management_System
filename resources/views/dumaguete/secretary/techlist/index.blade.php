
@extends('layouts.app')
@include('components.sidebar')
@include('admin.components.topbar')
 @include('admin.components.footer')

 
@section('TechList')

<div class="container">
    <div class="item item-9">
         
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('whitelinestecS') }}" style="text-decoration: none;">
                <span class="head" style="color: black;">Whitelines Technicians</span>
            </a>
        </div>
        <div class="col-4" style="margin-bottom: 1rem; margin-left: 8rem; width:15rem; float:right;">
            <form action="{{ route('whitelinestecS') }}" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search users...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Address</th>
                        <th>Birthday</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->fname}}</td>
                        <td>{{ $user->lname}}</td>
                        <td>{{ $user->address}}</td>
                        <td>{{ $user->bdate}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->email}}</td>
                        <td>
                            {{$user->role}}</td>
                       </td>
                       <td>   @if ($user->status === 1)
                        <span class="act">Active</span>
                      @elseif ($user->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$user->status}}</span>
                      @endif</td>
                  
                        {{-- <td>
                            <div class="">
                                <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary edit-button">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$user->id}}">Delete</button>
                            </div>
                        </td> --}}
                    </tr>
                     
                    <!-- Delete User Modal -->
                    <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$user->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{$user->id}}">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this user?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form method="POST" action="{{route('users.destroy', $user->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                    @endforeach
                </tbody>
              </table>
            </div>
            {{$data->links()}}
        </div>
   

    </div>

@endsection

