<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Emcor - Login</title>
            <!--bootstrap-->
            <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">    
            @vite('resources/css/app.css')

            <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">
            
            <link rel="stylesheet" href="{{asset('resources/css/app.css')}}">
<style>

    body{
        background-image: url("/assets/images/");
       
    }

    .card-header{
        text-align: center;
    }
    
</style>

    
    </head>


<body>
   
    <div class= "contianer " style="  margin-top: 100px; opacity: 85%; ">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="card ">
                    <div class="card-header">
                         
                       <h3>User Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('login')}}">
                            @if(Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                            @endif
                            @if(Session::get('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                            @endif
                            @csrf
                                <div class="form-group">
                                <label for="InputEmail">Email address</label>
                                <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="{{ old ('email') }}">
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
                                <label class="chech_container">Remember me
                                    <input type="checkbox" name="remember" 
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type=="submit" class="btn btn-primary">Submit</button>
                            <span class="text">Don't have an account?</span><a href="/register" class="href">Register</a><br>
                            <a href="{{ route('login_form')}}" class="adl">Login as Admin</a>
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




