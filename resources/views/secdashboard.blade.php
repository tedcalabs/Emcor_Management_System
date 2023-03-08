

@extends('layouts.app')
  
@include('components.TopBar')
@section('content')
        
<div class="mainbody">
   <div class="close slider ">
       <div class="profile">
           <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
           <div class="profileText">
               <p class="text maintext">{{Auth::user()->name}}</p>
           </div>
       </div>
       <div class="links">
           <div class="search">
           <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
       </div>

       <a href="">
       <div class="dashboard childs">
           <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
       </div></a>

<a href="{{route('maintenance.index')}}">
       <div class="notifications childs">
           <i class="fa-solid fa-bell icons"></i><p class="text">Maintainance Request</p>
       </div>
    </a>

       <div class="messages childs">
           <i class="fa-solid fa-envelope icons"></i><p class="text">Technicians</p>
       </div>
       <div class="heart childs">
           <i class="fa-regular fa-heart icons"></i><p class="text">Request Info</p>
       </div>
       <div class="coins childs">
           <i class="fa-solid fa-coins icons"></i><p class="text">Profile</p>
       </div><hr>


       <div class="logout childs">

         <form action="{{ route('logout')}}" method="post">
            @csrf
           
            <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>

        </form>
     
</div>
</div>





@endsection









