
@section('sidebarW')

<div class="mainbody">
    <div class="close slider">
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
            <p class="headtext" >Work Expert</p>
        </div>
        <a href="{{ route('workexpertb.dashboard') }}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div>
    </a>
        <a href="{{ route('workexpertb.sched') }}">
        <div class="messages childs">
            <i class="fas fa-tools icons"></i><p class="text">Whitelines</p>
        </div>
    </a>
    <a href="{{ route('getBrownlinesb.request') }}">
        <div class="messages childs">
            <i class="fas fa-tools icons"></i><p class="text">Brownlines</p>
        </div>
    </a>
    <a href="{{ route('getMechanicb.request') }}">
        <div class="messages childs">
            <i class="fas fa-tools icons"></i><p class="text">Mechanics</p>
        </div>
    </a>
    <a href="{{ route('workexpertb.profile') }}">
        <div class="messages childs">
            <i class="fas fa-user icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="logout childs">
 
          <form action="{{ route('bbWexcbywn.logout')}}" method="GET">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>

@endsection