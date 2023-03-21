
@section('sidebar')
        
<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{  asset('uploads/profile/'.Auth::user()->picture) }} " alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::user()->name}}</p>
            </div>
        </div>
        <div class="links">
            <div class="search">
            <i class="fa-solid fa-magnifying-glass icons"></i><input type="search" placeholder = "Search" class="searchbtn">
        </div>
 
        <a href="{{ route('secretary.dashboard') }}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div></a>
 
 <a href="{{ route('mreq')}}">
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p class="text"> Request</p>
        </div>
     </a>
 
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Technicians</p>
        </div>
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Request Info</p>
        </div>
        <a href="{{route('secretary.profile')}}">
        <div class="coins childs">
            <i class="fa-solid fa-coins icons"></i><p class="text">Profile</p>
        </div>
        
     </a>
        
        <hr>
 
 
        <div class="logout childs">
 
          <form action="{{ route('logout')}}" method="post">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>
 


@endsection