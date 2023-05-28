@extends('admin.admin_master')
@include('admin.components.topbar')
@include('admin.components.sidebar')
@include('admin.components.footer')
@section('users')


<div class="container">
    <div class="item item-9">       
        <div class="card edit-info">
                <div class="card-header u_info">
                    <span> Edit User Info</span>         
                   <a href="{{route('users.index')}}" class="close_bot">Close</a>
                </div>  
              
                    
                            <form method="POST" action="{{ route('users.update',$user) }}" enctype="multipart/form-data">
                                 @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6  form-group">
                                    <label for="fname" class="form-label">First Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="fname" name="fname" value="{{ $user->fname }}"
                                            class="form-control @error('fname') border-red-400 @enderror" />
                                    </div>
                                    @error('fname')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6  form-group">
                                    <label for="lname" class="form-label"> Last Name</label>
                                    <div class="mt-1">
                                        <input type="text" id="lname" name="lname" value="{{ $user->lname }}"
                                        class="form-control @error('lname') border-red-400 @enderror" />
                                    </div>
                                    @error('lname')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>    
                    <div class="row">
                            <div class="col-4  form-group">
                                <label for="bdate" class="form-label">Birthday</label>
                                <div class="mt-1">
                                    <input type="text" id="bdate" name="bdate" value="{{ $user->bdate }}"
                                    class="form-control @error('bdate') border-red-400 @enderror" />
                            </div>
                            @error('bdate')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>  
                                <div class="col-4  form-group">
                                    <label for="phone" class="form-label"> Phone </label>
                                    <div class="mt-1">
                                        <input type="text" id="phone" name="phone" value="{{ $user->phone }}"
                                        class="form-control @error('phone') border-red-400 @enderror" />
                                </div>
                                @error('phone')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                              
                            <div class="col-4  form-group">
                                <label for="email" class="form-label"> Email/Username</label>
                                <div class="mt-1">
                                    <input type="text" id="email" name="email" value="{{ $user->email }}"
                                    class="form-control @error('email') border-red-400 @enderror" />
                                </div>
                                @error('email')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" id="role" name="role" value="{{ $user->role }}" class="form-control @error('role') is-invalid @enderror" />
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" id="status" name="status" value="{{ $user->status }}" class="form-control @error('status') is-invalid @enderror" />
                                    <div id="emailHelp" class="form-text">1 for Active, 0 for Not active</div>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-button">
                            <button type="submit"
                                class="btn btn-grey submit-button ">Submit</button>
                        </div>
                    </form>
</div>       
</div>           
</div>           

@endsection