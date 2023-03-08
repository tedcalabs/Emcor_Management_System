

@extends('admin.admin_master')
@include('admin.topbar')

<section>
   
<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::guard('admin')->user()->name}}</p>
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

<a href="{{route('categories.index')}}">
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p class="text">Service Categories</p>
        </div></a>


<a href="{{route('services.index')}}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Services</p>
        </div></a>
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Maintainance Request</p>
        </div>
<a href="{{route('users.index')}}">
        <div class="coins childs">
            <i class="fa-solid fa-coins icons"></i><p class="text">User Management</p>
        </div></a>

        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Profile</p>
        </div>
        

 
        <div class="heart childs">
 
          <form  method="get" action="{{ route('admin.logout')}}">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
        </div>

        </div>
 </div>



 
</section>




