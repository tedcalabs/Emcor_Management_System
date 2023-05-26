@section('sidebarbs')
 <div class="mainbody">
    <div class="close slider">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        
        </div>
        <div class="profile">
            <img src=" {{  asset('uploads/profile/'.Auth::guard('bsec')->user()->picture) }} " alt="profileImage" class="image">
            <div class="profileText">
                <p class="maintext">{{Auth::guard('bsec')->user()->fname}} {{Auth::guard('bsec')->user()->lname}}</p>
            </div>
        </div>
        <div class="user-label">

            <p class="headtext" >Secretary</p>
        </div>
       
 
        <a href="{{ route('bsec.dashboard') }}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
                </div></a>
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Request
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('mreqb')}}">Whitelines</a></li>
            <li><a class="dropdown-item" href="{{ route('brownlines.req.bwyn')}}">Brownlines</a></li>
            <li><a class="dropdown-item" href="{{ route('getmechanic.bywn.req')}}">Mechanic</a></li>
            <li><a class="dropdown-item" href="{{ route('bdeclined.list')}}">Declined Request</a></li
            </ul>
        </div>
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Technicians
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('whitelinestecSb')}}">Whitelines</a></li>
            <li><a class="dropdown-item" href="{{ route('brownlinestecSb')}}">Brownlines</a></li>
            </ul>
        </div>
        <a href="{{ route('mechanicSb')}}">
            <div class="messages childs">
                <i class="fa-solid fa-envelope icons"></i><p class="text">Mechanics</p>
            </div>
        </a>
        <a href="{{ route('cuslistb')}}">
            <div class="messages childs">
                <i class="fa-solid fa-envelope icons"></i><p class="text">Customers</p>
            </div>
        </a>
            <a href="{{ route('secretaryb.profile') }}">
            <div class="coins childs">
                <i class="fa-solid fa-coins icons"></i><p class="text">Profile</p>
            </div>
                
        </a>
            
            <hr>
    
 
        <div class="heart childs">
 
          <form action="{{ route('bsec.logout') }}" method="GET">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
        </div>
        </div>
        </div>



@endsection