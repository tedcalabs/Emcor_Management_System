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
              
              .header-blue .navbar .navbar-collapse span .login {
                color: #fff;
                margin-right: .5rem;
                text-decoration: none;
              }
              
              .header-blue .navbar .navbar-collapse span .login:hover {
                color: #fff;
              }
              
              .header-blue .navbar .navbar-toggler {
                border-color: rgba(255,255,255,0.3);
              }
              
              .header-blue .navbar .navbar-toggler:hover, .header-blue .navbar-toggler:focus {
                background: none;
              }
              
              @media (min-width: 768px) {
                .header-blue .navbar-nav .nav-link {
                  padding-left: .7rem;
                  padding-right: .7rem;
                }
              }
              
              @media (min-width: 992px) {
                .header-blue .navbar-nav .nav-link {
                  padding-left: 1.2rem;
                  padding-right: 1.2rem;
                }
              }
              
              .header-blue .navbar.navbar-light .navbar-nav .nav-link {
                color: #fff;
              }
              
              .header-blue .navbar.navbar-light .navbar-nav .nav-link:focus, .header-blue .navbar.navbar-light .navbar-nav .nav-link:hover {
                color: #fcfeff !important;
                background-color: transparent;
              }
              
              .header-blue .navbar .navbar-nav > li > .dropdown-menu {
                margin-top: -5px;
                box-shadow: 0 4px 8px rgba(0,0,0,.1);
                background-color: #fff;
                border-radius: 2px;
              }
              
              .header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item {
                line-height: 2;
                color: #37434d;
              }
              
              .header-blue .navbar .dropdown-menu .dropdown-item:focus, .header-blue .navbar .dropdown-menu .dropdown-item:hover {
                background: #ebeff1;
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
              
              .header-blue .action-button:hover {
                color: #fff;
              }
              
              .header-blue .navbar .form-inline label {
                color: #d9d9d9;
              }
              
              .header-blue .hero {
                margin-top: 20px;
                text-align: center;
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
              
                  width: 550px;
                  height: 750px;
                  background: transparent;
                  background-color: #F2F2F2;
                  border: 2px solid rgba(255,255,255,0.5);
                  border-radius: 5px;
                  backdrop-filter: blur(10px);
                  display: flex;
                  justify-content: center;
                  align-items: center;
                
              }
              
              h2{
                  font-size: 2em;
                  color: #040303;
                  text-align: center;
              }
              
              
                  a{
                  color: #040303;
                  text-decoration: none;
                        }
                        .card-body:hover>a{
                          color: #040303;
                        
                        }
                        .huhu:hover{
                          color: #040303;
                          
                        }
                         
              .grnbuton{
                      position: relative;
                      background-color: #F21313;
                      color: #fff;
                      border: none;
                      border-radius: 10px;
                      padding: 5px;
                      float: left;
                      font-size: 20px;
                      min-height: 30px;
                      min-width: 100px;
                      
                    }
              
              
              .form-group label{
              float: left;
              color: #040303;
              }
              
              
              
              
              .form-group input {
                  width: 100%;
                  height: 50px;
                  font-size: 1em;
                  padding:0 35px 0 5px;
                  color: #120f0f;
              }
              
                              
                          </style>
    </head>

<body>


        <div class="header-blue">
            <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                <div class="container-fluid"><a class="navbar-brand" href="/">EMCOR Servicing Request System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                  
                    
                     
                </div>
            </nav>

              <div class="">
                <div class="row">
                  <div class="col-4"></div>
                    <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                       <h2>Sign Up</h2>
                            
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('bsec.register.create') }}">
                                @if(Session::get('success'))
                                <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                @if(Session::get('fail'))
                                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                                @endif
                                @csrf
                                <div class="row">
                                <div class="col-6  form-group">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name" value="{{ old ('fname') }}">
                                    @error('fname')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-6  form-group">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name" value="{{ old ('lname') }}">
                                    @error('lname')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>
                              <div class=" form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Complete Address" value="{{ old ('address') }}">
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-7  form-group">
                                  <label for="phone">Contact Number</label>
                                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="{{ old ('phone') }}">
                                  @error('phone')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                              <div class="col-5  form-group">
                                <label for="bdate">Birthday</label>
                                <input type="date" class="form-control" id="bdate" name="bdate" value="{{ old ('bdate') }}">
                                @error('bdate')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                                <div class="col-7 form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old ('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-5  form-group">
                                  <label for="gender">Gender</label>
                                  <input type="text" class="form-control" id="gender" name="gender" value="{{ old ('gender') }}">
                                  @error('gender  ')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                            </div>
                      <div class="row">
                                <div class="col-6 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ old ('password') }}">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-6 form-group">
                                    <label for="password2" class="inline-block text-lg mb-2">
                                      Confirm Password
                                    </label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                                      value="{{old('password_confirmation')}}" />
                            
                                    @error('password_confirmation')
                                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                  </div>
                                
                                </div>   
                             
                                <button type="submit" class="grnbuton">Sign Up</button><br>

                                
                                <a href="{{ route('userB_loginform') }}" class="huhu">
                                  <span class="float-right">Already have an account?</span> </a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
             </div>
        </div>
      </div>

</body>

</html>
