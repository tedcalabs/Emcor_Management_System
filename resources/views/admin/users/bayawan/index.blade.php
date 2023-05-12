@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')
@section('usersbayawan')

<div class="container">
    <div class="item item-9">
         
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
    <div class="row">
        <div class="col-8">
            <a href="{{ route('usersbyn.index') }}" style="text-decoration: none;">
                <span class="head" style="color: black;">Bayawan Users list</span>
            </a>
        </div>
        <div class="col-4" style="margin-bottom: 1rem; margin-left: 8rem; width:15rem; float:right;">
            <form action="{{ route('usersbyn.index') }}" method="get">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search users...">
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
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody> 
                    @foreach ($data as $usersbyn)
                    <tr>
                        <td>{{ $usersbyn->id}}</td>
                        <td>{{ $usersbyn->fname}}</td>
                        <td>{{ $usersbyn->lname}}</td>
                        <td>{{ $usersbyn->address}}</td>
                        <td>{{ $usersbyn->bdate}}</td>
                        <td>{{ $usersbyn->phone}}</td>
                        <td>{{ $usersbyn->email}}</td>
                   
                        <td>
                       
                            {{$usersbyn->role}}</td>
                     
                       </td>
                       <td>   @if ($usersbyn->status === 1)
                        <span class="act">Active</span>
                      @elseif ($usersbyn->status === 0)
                        <span class="inact">Not Active</span>
                      @else
                        <span class="">{{$usersbyn->status}}</span>
                      @endif</td>
                  
                        <td>
                            <div class=" ">
                                <a href="{{route('usersbyn.edit', $usersbyn->id) }}" class="btn btn-primary edit-button">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$usersbyn->id}}">Delete</button>
                            </div>
                        </td>
                    </tr>
                     
                    <!-- Delete usersbyn Modal -->
                    <div class="modal fade" id="deleteModal{{$usersbyn->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$usersbyn->id}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{$usersbyn->id}}">Delete usersbyn</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this usersbyn?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form method="POST" action="{{route('usersbyn.destroy', $usersbyn->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                     
                  
                    @endforeach
                 
                    
                </tbody>
              </table>
            </div>
            {{ $data->links() }}
        </div>
 

    </div>
    
@endsection
