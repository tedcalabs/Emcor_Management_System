@section('sidebarM')

<div class="sidebar">
    <div class="close slider">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        
        </div>


        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::guard('bsec')->user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::guard('bsec')->user()->fname}} {{Auth::guard('bsec')->user()->lname}}</p>
            </div>
        </div>
        <div class="user-label">
           
            <p class="headtext" >Manager</p>
        </div>
        <a href="{{ route('managerb.dashboard')}}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div>
    </a>
    <div class="notifications childs">
        <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Transactions
        </p>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('whitelinesb.tansaction')}}">Whitelines</a></li>
        <li><a class="dropdown-item" href="{{ route('brownlinesb.tansaction')}}">Brownlines</a></li>
        <li><a class="dropdown-item" href="{{ route('mechanicb.tansaction')}}">Mechanic</a></li>
        </ul>
    </div>
<div class="notifications childs">
    <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Employees
    </p>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ route('secretaryb.employees')}}">Secretaries</a></li>
    <li><a class="dropdown-item" href="{{ route('whitelinestecb.employees')}}">Whitelines Technicians</a></li>
    <li><a class="dropdown-item" href="{{ route('bltecb.employees')}}">Brownlines Technicians</a></li>
    <li><a class="dropdown-item" href="{{ route('mechanicb.employees')}}">Mechanics</a></li>
    <li><a class="dropdown-item" href="{{ route('workexb.employees')}}">Work Experts</a></li>
    </ul>
</div>
<a href="{{ route('customerslistb')}}">
    <div class="messages childs">
        <i class="fa-solid fa-envelope icons"></i><p class="text">Customers</p>
    </div>
</a>
    <a href="{{ route('managerb.profile') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Profile</p>
        </div>
    </a>
        <div class="logout childs">
 
          <form action="{{ route('bbmanager.logout')}}" method="GET">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="lgbutton" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>

@endsection