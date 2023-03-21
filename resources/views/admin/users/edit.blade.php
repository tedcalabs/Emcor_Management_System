@extends('admin.admin_master')
@include('admin.index')
@section('users')


<div class= "contianer " style="  margin-top: 80px; margin-left: 270px; margin-right: 300px; ">
    <div class="row">
     
        <div class="col">
            <div class="card">
           

                <div class="card-header u_info">
                    <h1>Edit User Info</h1>          
                   <a href="{{route('users.index')}}" class="close_bot">Close</a>
                </div>  
                <div class="card-body">
                    
                            <form method="POST" action="{{ route('users.update',$user) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sm:col-span-6">
                                    <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" value="{{ $user->name }}"
                                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-400 @enderror" />
                                    </div>
                                    @error('name')
                                        <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="sm:col-span-6">
                                    <label for="phone" class="block text-sm font-medium text-gray-700"> phone </label>
                                    <div class="mt-1">
                                        <input type="text" id="phone" name="phone" value="{{ $user->phone }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('phone') border-red-400 @enderror" />
                                </div>
                                @error('phone')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        
                            <div class="sm:col-span-6">
                                <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
                                <div class="mt-1">
                                    <input type="email" id="email" name="email" value="{{ $user->email }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-400 @enderror" />
                                </div>
                                @error('email')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                           
                         
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <div class="mt-1">
                                <input type="text" id="role" name="role" value="{{ $user->role}}"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('role') border-red-400 @enderror" />
                            </div>
                            @error('role')
                                <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-6">
                            <label for="role" class="block text-sm font-medium text-gray-700">Branch</label>
                            <div class="mt-1">
                            <input type="text" id="branch" name="branch" value="{{ $user->branch}}"
                                class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('branch') border-red-400 @enderror" />
                        </div>
                        @error('branch')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="sm:col-span-6">
                        <label for="role" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                        <input type="text" id="status" name="status" value="{{ $user->role}}"
                            class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('status') border-red-400 @enderror" />
                    </div>
                    @error('status')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                        <div class="mt-6 p-4">
                            <button type="submit"
                                class="btn btn-info  float-left bg-slate-400">Update</button>
                        </div>
                    </form>
               
                </div>
            </div>
        </div>
   
</div>
                
           

@endsection