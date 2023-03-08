@extends('admin.admin_master')
@include('admin.index')
@section('users')

<div class="table_area">
         <a  href="{{ route('users.create')}}" class="btn btn-info " >Create User</a>
      
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
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
                        <td>{{ $user->email}}</td>
                   
                        <td>
                       
                            {{$user->role}}</td>
                     
                       </td>
                        <td>
                            <div class=" ">
                                <a href="" class="btn btn-info">Edit</a>
                                <form method="POST"
                                        action=""
                                        onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                <button type="submit" class="btn btn-red">Delete</button>
                                
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