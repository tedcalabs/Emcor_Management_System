

@extends('branchb.secretary.layouts.bsec_base')
@include('branchb.secretary.components.topbar')
@include('branchb.secretary.components.sidebar')
@section('bsecprofile')

<div class="container">
  <div class="item item-4">
    <!-- Content Header (Page header) -->
    <section class="content-header prof">
        <div class="container-fluid">
          <div class="row mb-2">
        
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="sech">Secretrary Profile</li>
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
                       <img class="profile-user-img img-fluid img-circle admin_picture" src="{{  asset('uploads/profile/'.Auth::guard('bsec')->user()->picture) }}" alt="User profile picture"> 
                  
                 <p class="u_name">{{Auth::guard('bsec')->user()->name}}</p>
                
                 <form method="POST" action="{{ route('update.secb.photo') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="sm:col-span-6">
                   <input type="file" name="picture"   class=""> <br>
                 
                    </div>
        
            <div class="">
                <button type="submit"
                    class="btn btn-info " style="margin-top: 3px">Update</button>
            </div>
        </form>
                
                
                </div>
  
  
                <!--   <p class="text-muted text-center">Secretary</p  -->

           
                  
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
          
            </div>
            <!-- /.col -->
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
                      <form class="form-horizontal" method="POST" action="{{ route('bsecretaryUpdateInfo') }}" id="SecInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" value="{{Auth::guard('bsec')->user()->name}}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="Email" value="{{Auth::guard('bsec')->user()->email}}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Contact Number</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="phone" placeholder="Phone" value="{{Auth::guard('bsec')->user()->phone}}" name="phone">
                              <span class="text-danger error-text phone_error"></span>
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
                <form class="form-horizontal" method="POST" action="{{ route('secbChangePass') }}"  id="changePasswordAdminForm">
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
