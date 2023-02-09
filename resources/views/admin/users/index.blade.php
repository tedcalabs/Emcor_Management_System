@extends('admin.admin_base')
@include('admin.index')
@section('categories')
 <!-- table area -->
 <section class="table_area">
  <div class="panel">

      <div class="panel_header ">
       
          <div class="panel_title">

         <a  href="{{ route('users.create')}}" class="btn btn-info " >Create User</a>
        </div>
      </div>
      <div class="panel_body">
          <div class="table-responsive">
              <table class="table table-bordered">
                  <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>password</th>
                        <th>Roles</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->id}}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->password}}</td>
                        <td>
                        @foreach ($user->roles as $role)
                            {{ $role->name}}</td>
                        @endforeach
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
  </div> <!-- /table -->
@endsection