@section('sidebarBl')

<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        </div>
        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="maintext">{{Auth::user()->fname}} {{Auth::user()->lname}}</p>
            </div>
        </div>
        <div class="user-label">  
            <p class="headtext" >Brownlines Technician</p>
        </div>
        <a href="{{ route('brownlines.dashboard') }}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div>
    </a>
    <a href="{{ route('bl.sched') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Servicing Schedules</p>
        </div>
    </a>
    <a href="{{ route('completed.sched.brwn') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Completed Services</p>
        </div>
    </a>
    <a href="{{ route('brownlines.profile') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="logout childs">
 
          <form action="{{ route('logout')}}" method="post">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>

@endsection