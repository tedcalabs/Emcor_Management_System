
<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
  integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/scss/app.scss','resources/css/app.css','resources/js/app.js'])

  
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  

<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<style>



</style>
<body>
 

    {{-- VIEW OUTPUT--}}
    <main>
      @yield ('categories')
      @yield ('services')
      @yield ('technicians')
      @yield ('users')
      @yield ('requests') 
      @yield ('sidenav')
      @yield ('content')
      </main> 
      
    </body>
</html>

