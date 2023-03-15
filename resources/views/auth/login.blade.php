<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Emcor - Login</title>
       
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      
  
<style>

    body{
      background-image: url("/assets/images/emcor6.jpg");
      background-size: cover;
       
    }

    .card-header{
        text-align: center;
    }
    .header-blue {
  padding-bottom: 80px;
  font-family: 'Source Sans Pro', sans-serif;
}

@media (min-width:768px) {
  .header-blue {
    padding-bottom: 120px;
  }
}

.header-blue .navbar {
  background: transparent;
  padding-top: .75rem;
  padding-bottom: .75rem;
  color: #fff;
  border-radius: 0;
  box-shadow: none;
  border: none;
}

@media (min-width:768px) {
  .header-blue .navbar {
    padding-top: 1rem;
    padding-bottom: 1rem;
  }
}

.header-blue .navbar .navbar-brand {
  font-weight: bold;
  color: inherit;
}

.header-blue .navbar .navbar-brand:hover {
  color: #f0f0f0;
}

.header-blue .navbar .navbar-collapse {
  border-top: 1px solid rgba(255,255,255,0.3);
  margin-top: .5rem;
}

@media (min-width:768px) {
  .header-blue .navbar .navbar-collapse {
    border-color: transparent;
    margin: 0;
  }
}


.header-blue .navbar .navbar-toggler {
  border-color: rgba(255,255,255,0.3);
}





.header-blue .action-button, .header-blue .action-button:not(.disabled):active {
  border: 1px solid rgb(255,255,255);
  border-radius: 40px;
  color: #fff;
  box-shadow: none;
  text-shadow: none;
  padding: .3rem .8rem;
  background: transparent;
  transition: background-color 0.25s;
  outline: none;
}



@media (min-width:768px) {
  .header-blue .hero {
    margin-top: 60px;
    text-align: left;
  }
}

.header-blue .hero h1 {
  color: #fff;
  font-size: 40px;
  margin-top: 0;
  margin-bottom: 15px;
  font-weight: 300;
  line-height: 1.4;
}

@media (min-width:992px) {
  .header-blue .hero h1 {
    margin-top: 190px;
    margin-bottom: 24px;
    line-height: 1.2;
  }
}

.header-blue .hero p {
  color: rgba(247, 237, 237, 0.995);
  font-size: 20px;
  margin-bottom: 30px;
  font-weight: 300;
}

.header-blue .phone-holder {
  text-align: right;
}

.header-blue div.iphone-mockup {
 position: relative;
    max-width: 300px;
    margin-top: 172px;
    display: inline-block;
}

.header-blue .iphone-mockup img.device {
  width: 100%;
  height: auto;
}

.header-blue .iphone-mockup .screen {
  position: absolute;
  width: 88%;
  height: 77%;
  top: 12%;
  border-radius: 2px;
  left: 6%;
  border: 1px solid #444;
  background-color: #aaa;
  overflow: hidden;
  background: url("/assets/images/emcor1.png");
       
  background-size: cover;
  background-position: center;
}

.header-blue .iphone-mockup .screen:before {
  content: '';
  background-color: #fff;
  position: absolute;
  width: 70%;
  height: 140%;
  top: -12%;
  right: -60%;
  transform: rotate(-19deg);
  opacity: 0.2;
}


.card{

    width: 400px;
    height: 460px;
    background: transparent;
    border: 2px solid rgba(255,255,255,0.5);
    border-radius: 5px;
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: center;
    align-items: center;
  
}

h2{
    font-size: 2em;
    color: #fff;
    text-align: center;
}


.form-group label{
float: left;
color: #fff;
}




.form-group input {
    width: 100%;
    height: 50px;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #0e0d0d;
}

.grnbuton{
  background-color: #177e89;
  float: left;
  font-size: 20px;
}
.grnbuton:hover{
  background-color: #db3a34;
}

</style>

    
    </head>


<body>

    <div>
        <div class="header-blue">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid">
                  
                  <div class="container-fluid"><a class="navbar-brand" href="/">EMCOR</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>

                   <div class="collapse navbar-collapse"
                        id="navcol-1">
                   
                      <div class="collapse navbar-collapse">
                    
                      </div>    
                         <a class="btn btn-light action-button" type="submit" role="button" href="/register">Signup</a>
                      </div>
                </div>
            </nav>

            <!--Emcor MVG-->
            <div class="container hero">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                        <h1>Emcor</h1>

                       <!--  <img class="logo-img" src="asset('assets/images/eclogo12.png')}}" alt="" class="logo"> -->
                         <p>EMCOR is the most relevant, world-class, community-based organization that enables customers to achieve a better life by providing quality products and services through personalized care.<br></p>
                    
                   
                        </div>

                    <!--Emcor Login form -->
   
                    <div class="col-12 col-lg-6 col-xl-5 offset-xl-1" style="margin-top:1in">
                      <div class="card">
                          <div class="card-header">
                  <div class="card">
                      <div class="card-header">
                     <h2>Login</h2>
                          
                      </div>
                      <div class="card-body">
                          <form method="POST" action="{{ route('login') }}">
                              @if(Session::get('success'))
                              <div class="alert alert-success">{{ Session::get('success') }}</div>
                              @endif
                              @if(Session::get('fail'))
                              <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                              @endif
                              @csrf
                              <div class="form-group">
                                  <label for="InputEmail">Email address</label>
                                  <input type="email"  id="InputEmail" name="email" placeholder="Enter email" value="{{ old ('email') }}">
                                  @error('email')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                    
                              <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password"  id="InputPassword" name="password" placeholder="Password" value="{{ old ('password') }}">
                                  @error('password')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="password2" class="inline-block text-lg mb-2">
                                    Confirm Password
                                  </label>
                                  <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                    value="{{old('password_confirmation')}}" />
                          
                                  @error('password_confirmation')
                                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                  @enderror
                                </div>
                                
                              <button type="submit" class="btn btn-primary grnbuton">Login</button>
                              
                                    <div class="dropdown show float-right">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              More Options
                                        </a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('login_form')}}">Login as Admin</a>
                                        </div>
                                    </div>
                                </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>             
    </body>
</html>



