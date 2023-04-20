@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')

@section('users')

<div class="container">
    <div class="item item-9">
         
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
                  
                        <td>
                            <div class=" ">
                                <a href="{{route('users.edit', $user->id) }}" class="btn btn-primary edit-button">Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete-modal">Delete</button>


                            </div>

                        </td>
                    </tr>
                     
                  
                    @endforeach
                 
                    
                </tbody>
              </table>
            </div>
        </div>
 

    </div>
    
@endsection

@section('script')
<script>
    // Get references to the form and the delete button
    const deleteForm = document.querySelector('#delete-form');
    const deleteButton = document.querySelector('#delete-button');
    
    // Add an event listener to the delete button
    deleteButton.addEventListener('click', () => {
        // Create a custom dialog box using the window.confirm method
        const confirmed = window.confirm('Are you sure you want to delete this user?');
        
        // If the user confirmed, submit the form
        if (confirmed) {
            deleteForm.submit();
        }
    });
</script>
@endsection


<section>
<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-delete-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-delete-modal-label">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>