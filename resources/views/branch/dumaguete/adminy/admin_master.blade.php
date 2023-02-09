<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('assets/styles.css') }}">
  <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">

  <style>
    body {
      margin: 0;
      font-family: "Lato", sans-serif;
    }
    .sidebar {
      margin: 0;
      padding: 0;
      width: 200px;
      background-color: #f1f1f1;
      position: fixed;
      height: 100%;
      overflow: auto;
    }
    
    .sidebar a {
      display: block;
      color: black;
      padding: 16px;
      text-decoration: none;
    }
     
    .sidebar a.active {
      background-color: #04AA6D;
      color: white;
    }
    
    .sidebar a:hover:not(.active) {
      background-color: 	#f08080	;
      color: white;
    }
    
    div.content {
      margin-left: 200px;
      padding: 1px 16px;
      height: 1000px;
    }
    
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .sidebar a {float: left;}
      div.content {margin-left: 0;}
    }
    
    @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    }

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #bfeeeb;
   color: white;
   text-align: center;
}
.navbar  {
height: .6in;
background: 		#83e8e3;
color: #f1f1f1;
top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding: 0.5rem 1rem;

}
.navbar li {
  float: left;
 
}
  
.navbar .logo-img{
    float: left;
    height: 30px;
    width: 200px;
    margin-bottom: 1ch;
}



.navbar .btn:hover {
  background: #f08080;
  color: black;
    
}

    </style>
</head>

<body>


    {{-- VIEW OUTPUT--}}
    <main>
      @yield ('content')
      @yield ('categories')
      @yield ('technicians')
      @yield ('services')
      @yield ('sidenav')
     
      </main>   


   
</body>

</html>

