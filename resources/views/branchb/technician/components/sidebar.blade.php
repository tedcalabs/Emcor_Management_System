@section('sidebarT')

 <div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        </div>
        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::guard('bsec')->user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="maintext">{{Auth::guard('bsec')->user()->fname}} {{Auth::guard('bsec')->user()->lname}}</p>
            </div>
        </div>
        <div class="user-label">  
            <p class="headtext" >Whitelines Technician</p>
        </div>
        <a href="{{ route('btec.dashboard') }}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div>
    </a>
    <a href="{{ route('whitebtech.sched') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Servicing Schedules</p>
        </div>
    </a>
    <a href="{{ route('completed.sched.bywn') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Completed Services</p>
        </div>
    </a>
    <a href="{{route('technicianb.profile') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="logout childs">
 
          <form method="GET" action="{{ route('bbtecbywn.logout') }}" >
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>
@endsection