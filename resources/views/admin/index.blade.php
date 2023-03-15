

@extends('admin.admin_master')
@include('admin.topbar')

<section>
    <div class="loader"></div>
<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::guard('admin')->user()->name}}</p>
            </div>
        </div>
        <div class="links">
            <div class="search">
            <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
        </div>
 
        <a href="{{route('admin.dashboard')}}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div></a>

<a href="{{route('categories.index')}}">
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p class="text">Services Categories</p>
        </div></a>


<a href="{{route('services.index')}}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Services</p>
        </div></a>
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Maintainance Request</p>
        </div>
<a href="{{route('users.index')}}">
        <div class="coins childs">
            <i class="fa-solid fa-coins icons"></i><p class="text">User Management</p>
        </div></a>
<a href="{{route('admin.profile')}}">
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="heart childs">
 
          <form  method="get" action="{{ route('admin.logout')}}">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
        </div>

        </div>
 </div>



 
</section>



<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit & Update Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <ul id="update_msgList"></ul>

                <input type="hidden" id="edit_td_id" />

                <div class="form-group mb-3">
                    <label for="">Name</label>
                    <input type="text" id="edit_name" required class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Phone</label>
                    <input type="text" id="edit_phone" required class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email" id="edit_email" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Role</label>
                    <input type="text" id="edit_role" required class="role form-control">
                </div>
          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary update_todolist text-black">Update</button>
            </div>

        </div>
    </div>
</div>
<!-- Edn- Edit Modal -->


<!--  Delete Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4>Confirm to Delete Data ?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_todolist text-black">Yes Delete</button>
            </div>
        </div>
    </div>
</div>
<!--  End - Delete Modal-->

<!--Add employee-->
<div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddModalLabel">Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <ul id="save_msgList"></ul>

                <div class="form-group mb-3">
                    <label for=""> Name</label>
                    <input type="text"  id="name" required class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">phone</label>
                    <input type="text" id="phone" required class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Email</label>
                    <input type="email"  id="email" required class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">password</label>
                    <input type="text"  id="password" required class="password form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Role</label>
                    <input type="text"  id="role" required class="role form-control">
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_todolist">Save</button>
            </div>

        </div>
    </div>
</div>

<!--end Add employee-->