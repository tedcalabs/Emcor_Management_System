<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
 
  @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    {{-- VIEW OUTPUT--}}
    <main>
      @yield ('topbarM')
      @yield('sidebarM')
      @yield('managerDashboard')
      @yield('schedule')
      @yield('updateReq')
      @yield('Mprofile')
      @yield('transactions')
      @yield('emSec')
      @yield('emWork')
      @yield('emWl')
      @yield('emBl')
      @yield('emMec')
      @yield('customer')
      @yield('whitetrans')
      @yield('browntrans')
      @yield('mectrans')
      @yield('footer')
      </main>   

    
</body>

</html>

