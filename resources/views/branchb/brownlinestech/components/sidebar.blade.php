@section('sidebarBl')

<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::guard('bsec')->user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::guard('bsec')->user()->fname}}</p>
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

        <a href="">
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Schedules</p>
        </div>
    </a>
<a href="{{ route('technicianb.profile') }}">
        <div class="heart childs">
            <i class="fa-regular fa-heart icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="heart childs">
 
          <form  method="get" action="{{ route('btec.logout') }}">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
        </div>

        </div>
 </div>
@endsection