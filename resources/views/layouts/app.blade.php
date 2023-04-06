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


  
  @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

  <div class="loader"></div>



    {{-- VIEW OUTPUT--}}
    <main>
      @yield ('sidebar') 
      @yield ('topbar')
      @yield ('content')
      @yield ('secprofile')
      @yield ('request')
      @yield ('requestf')
      @yield ('requestm')
      @yield ('mAccept')
      @yield('updateReq')
      @yield('test')
      @yield('testr')
      @yield('register')
      </main>   

      @yield ('script')   





</body>

</html>

