@section('adminSidebar')

<div class="sidebar">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        
        </div>
        <div class="profile">
            <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
            <div class="profileText">
             
                <p class="text maintext">{{Auth::guard('admin')->user()->name}}</p>
              
            </div>
        </div>
        <div class="user-label">
           
            <p class="text headtext" >Admin</p>
        </div>
        <div class="links">
            <div class="search">
            <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
        </div>
 
        <a href="{{route('admin.dashboard')}}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div></a>

<a href="{{route('categories.index')}}">
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p class="text">Services Categories</p>
        </div></a>


<a href="{{route('services.index')}}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Services</p>
        </div></a>
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Request
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href=" ">Dumaguete Branch</a></li>
            <li><a class="dropdown-item" href=" ">Bayawan Branch</a></li>
            </ul>
        </div>
<a href="{{route('users.index')}}">
        <div class="coins childs">
            <i class="fa-solid fa-coins icons"></i><p class="text">All Users</p>
        </div></a>

        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            User Management
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('secretary.employees')}}">Dumaguete Branch</a></li>
            <li><a class="dropdown-item" href="{{ route('whitelinestec.employees')}}">Bayawan Branch</a></li>
            </ul>
        </div>
<a href="{{route('admin.profile')}}">
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="heart childs">
 
          <form  method="get" action="{{ route('admin.logout')}}">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
        </div>

        </div>
</div>
</div>
@endsection