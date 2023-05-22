
@extends('dumaguete.manager.layouts.mngr_base')
@include('dumaguete.manager.components.topbar')
@include('dumaguete.manager.components.sidebar')
@section('Mprofile')



<div class="container">
  <div class="item item-4">
    <!-- Content Header (Page header) -->
    <section class="content-header prof">
        <div class="container-fluid">
          <div class="row mb-2">
        
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="sech">Manager Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">




            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="card card-profile">
                  <div class="card-body box-profile">
                      <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle admin_picture" src="{{  asset('uploads/profile/'.Auth::user()->picture) }}" alt="User profile picture"> 
                          <p class="u_name">{{Auth::user()->name}}</p>
                          <form method="POST" action="{{ route('update.mgr.photo') }}" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="sm:col-span-6">
                                  <!-- Custom button to trigger file input field -->
                                  <button type="button" class="btn btn-success" onclick="document.getElementById('admin-profile-pic').click()">Change Picture</button>
                 
                                  <input type="file" id="admin-profile-pic" name="picture" class="visually-hidden" onchange="document.getElementById('admin-submit-btn').click()">
                              </div>
                              <button type="submit" id="admin-submit-btn" class="visually-hidden"></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>








            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active bot" href="#personal_info" data-bs-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a class="nav-link " href="#change_password" data-bs-toggle="tab">Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('manager.UpdateInfo') }}" id="SecInfoForm">
                        <div class="form-group row">
                          <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="fname" placeholder="fname" value="{{Auth::user()->fname}}" name="fname">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="lname" placeholder="lname" value="{{Auth::user()->lname}}" name="lname">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="address" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" placeholder="address" value="{{Auth::user()->address}}" name="address">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="bdate" class="col-sm-2 col-form-label">Birthday</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" id="bdate" placeholder="bdate" value="{{Auth::user()->bdate}}" name="bdate">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputPhone" class="col-sm-2 col-form-label">Phone no.</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" placeholder="Phone" value="{{Auth::user()->phone}}" name="phone">
                            <span class="text-danger error-text phone_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="gender" placeholder="gender" value="{{Auth::user()->gender }}" name="gender">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{Auth::user()->email}}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                     
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
             <!-- /.tab-pane -->
             <div class="tab-pane" id="change_password">

                @if (session('message'))
                <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
            @endif

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
            @endif  
                <form class="form-horizontal" method="POST" action="{{ route('manager.changepass') }}"  id="changePasswordAdminForm">
                    @csrf
                    <div class="form-group row">
                    <label  class="col-sm-2 col-form-label">Current Passord</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control"  placeholder="Enter current password" name="current_password">
                      <span class="text-danger error-text oldpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="password">
                      <span class="text-danger error-text newpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="password_confirmation">
                      <span class="text-danger error-text cnewpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
          <!-- /.tab-content -->
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
  </div>



@endsection
