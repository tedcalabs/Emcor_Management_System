<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI9Md+D4WUw6Ml1E+" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  
  
  @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
  
  <meta name="csrf-token" content="{{ csrf_token() }}">

  
  <style>
  
    body{
    /* background-color: #0D0D0D; */
      }
    </style>
</head>

<body>

    <main>
      @yield ('sidebar') 
      @yield ('adminTopbar')
      @yield ('content')
      @yield ('secprofile')
      @yield ('request')
      @yield ('requestf')
      @yield ('requestm')
      @yield ('mAccept')
      @yield('updateReq')
      @yield('updateBrownReq')
      @yield('updateMechReq')
      @yield('TechList')
      @yield('SemBl')
      @yield('SemMec')
      @yield('Scustomer')
      @yield('ShowRequestW')
      @yield('ShowRequestWz')
      @yield('ShowRequestWzd')
      @yield('test')
      @yield('testr')
      @yield('register')
      @yield('declined')
      @yield ('footer')
      </main>   

</body>

</html>
