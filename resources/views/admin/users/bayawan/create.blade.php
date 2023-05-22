@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')
@section('users')


<div class="container">
    <div class="item item-9">       
        <div class="card edit-info">
                <div class="card-header u_info">
                    <span>Create New User</span>         
                   <a href="{{route('usersbyn.index')}}" class="close_bot">Close</a>
                        </div>                 
                            <form method="POST" action="{{ route('usersbyn.store') }}" enctype="multipart/form-data">
                                @if(Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::get('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                @endif
                                 @csrf
                                <div class="row">
                                    <div class="col-6  form-group">
                                    <label for="fname" class="form-label">First Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="fname" name="fname" 
                                            class="form-control @error('fname') border-red-400 @enderror" />
                                    </div>
                                    @error('fname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                  </div>
                                   <div class="col-6  form-group">
                                    <label for="lname" class="form-label"> Last Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="lname" name="lname" 
                                        class="form-control @error('lname') border-red-400 @enderror" />
                                     </div>
                                    @error('lname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                             </div>    
                          <div class="row">
                            <div class="col-4 form-group">
                                <label for="bdate" class="form-label">Birthday</label>
                                <div class="mt-1">
                                    <input type="date" id="bdate" name="bdate" class="form-control @error('bdate') border-red-400 @enderror" />
                                </div>
                                @error('bdate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                                <div class="col-4  form-group">
                                    <label for="phone" class="form-label">Contact Number</label>
                                    <div class="mt-1">
                                        <input type="text" id="phone" name="phone" 
                                        class="form-control @error('phone') border-red-400 @enderror" />
                                </div>
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>    
                            <div class="col-4  form-group">
                                <label for="address" class="form-label">Address</label>
                                <div class="mt-1">
                                    <input type="text" id="address" name="address" 
                                    class="form-control @error('address') border-red-400 @enderror" />
                            </div>
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>  
                            <div class="col-4  form-group">
                                <label for="email" class="form-label">Username</label>
                                <div class="mt-1">
                                    <input type="text" id="email" name="email" 
                                    class="form-control @error('email') border-red-400 @enderror" />
                                </div>
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4  form-group">
                                <label for="password" class="form-label">Password</label>
                                <div class="mt-1">
                                    <input type="text" id="password" name="password" 
                                    class="form-control @error('password') border-red-400 @enderror" />
                                </div>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                      
                            <div class="col-4  form-group">
                                <label for="role" class="form-label">Role</label>
                                <div class="mt-1">
                                <input type="text" id="role" name="role" 
                                class="form-control @error('role') border-red-400 @enderror" />
                            </div>
                            @error('role')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     <div class="col-4  form-group">
                        <label for="role" class="form-label">Status</label>
                        <div class="mt-1">
                        <input type="text" id="status" name="status" 
                        class="form-control @error('status') border-red-400 @enderror" />
                    </div>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                     </div>
                        <div class="card-button">
                            <button type="submit"
                                class="btn btn-info submit-button">Submit</button>
                        </div>
                    </form>
                 </div>       
                </div>           
            </div>           

@endsection