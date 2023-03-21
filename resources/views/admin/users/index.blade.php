@extends('admin.admin_master')
@include('admin.index')
@section('users')

<div class="table_area">

         
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif
        <div class="title_user">Users List</div>
      
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody> 
                    @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->phone}}</td>
                        <td>{{ $user->email}}</td>
                   
                        <td>
                       
                            {{$user->role}}</td>
                     
                       </td>
                        <td>
                            <div class=" ">
                                <a href="{{route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
                                <form method="POST" 
                                        action="{{route('users.destroy', $user->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-danger" style="margin-top: 3px">Delete</button>
                                
                            </form>

                            </div>

                        </td>
                    </tr>
                     
                  
                    @endforeach
                 
                    
                </tbody>
              </table>
            </div>
        </div>
 


    
@endsection