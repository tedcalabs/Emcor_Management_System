<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Emcor - Admin Register</title>
        <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">    
        @vite('resources/css/app.css')

        <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">
        
        <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
        <style>

            body{
                background-image: url("/assets/images/back3.png");
               
            }
        
            .card-header{
                text-align: center;
            }
            
        </style>
    </head>
    <body>
        <div class="container" style="  margin-top: 50px; margin-left: 4in; ">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                        @if(Session::has('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session::get('error')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                @endif
                                <h2> Register</h2>
                        
                        </div>
                        <div class="card-body">
                        
                        <form  method="POST" action="{{ route('admin.register.create')}}" >
                            @if(Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::get('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old ('name') }}">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                         
                            <div class="form-group">
                                <label for="InputEmail">Email address</label>
                                <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="{{ old ('email') }}">
                                <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                  
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" value="{{ old ('password') }}">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password2" class=" ">
                                  Confirm Password
                                </label>
                                <input type="password" class=" form-control" name="password_confirmation"
                                  value="{{old('password_confirmation')}}" />
                        
                                @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                              </div>
                              
                            <div class="form-group">
                                <a class="registration" href=" {{ route('login_form') }} ">Already have an account</a><br>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>    
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </div>

    </body>
</html>