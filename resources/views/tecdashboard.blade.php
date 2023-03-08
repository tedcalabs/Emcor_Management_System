

@extends('layouts.app')
  

@section('content')
        
<div class="mainbody">
   <div class="close slider ">
       <div class="profile">
           <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
           <div class="profileText">
               <p class="text maintext">Dumaguete Technician</p>
           </div>
       </div>
       <div class="arrow">
           <i class="fa-solid fa-arrow-right-long"></i>
       </div>
       <div class="links">
           <div class="search">
           <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
       </div>

       <a href="">
       <div class="dashboard childs">
           <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
       </div></a>
       <div class="notifications childs">
           <i class="fa-solid fa-bell icons"></i><p class="text">Notifications</p>
       </div>
       <div class="messages childs">
           <i class="fa-solid fa-envelope icons"></i><p class="text">Schedules</p>
       </div>
       <div class="heart childs">
           <i class="fa-regular fa-heart icons"></i><p class="text">Likes</p>
       </div>
       <div class="coins childs">
           <i class="fa-solid fa-coins icons"></i><p class="text">Money</p>
       </div><hr>


       <div class="logout childs">

         <form action="{{ route('logout')}}" method="post">
            @csrf
           
            <i class="fa-solid fa-right-from-bracket icons"></i><button class="text" type="submit">Logout</button>

        </form>
     
       </div>

       <div class="toggle">
           <input type="checkbox" class="checkbox">
           <p class="text" id="toggleText">Dark Mode</p>
       </div>
       </div>
</div>
</div>





@endsection









