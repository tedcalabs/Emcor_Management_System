@section('sidebarM')

<div class="sidebar">
    <div class="close slider">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        
        </div>


        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::user()->fname}} {{Auth::user()->lname}}</p>
            </div>
        </div>
        <div class="user-label">
           
            <p class="headtext" >Manager</p>
        </div>
        <a href="{{ route('manager.dashboard')}}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div>
    </a>
    <div class="notifications childs">
        <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Transactions
        </p>
        <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('whitelines.tansaction')}}">Whitelines</a></li>
        <li><a class="dropdown-item" href="{{ route('brownlines.tansaction')}}">Brownlines</a></li>
        <li><a class="dropdown-item" href="{{ route('mechanic.tansaction')}}">Mechanic</a></li>
        </ul>
    </div>
<div class="notifications childs">
    <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Employees
    </p>
    <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{ route('secretary.employees')}}">Secretaries</a></li>
    <li><a class="dropdown-item" href="{{ route('whitelinestec.employees')}}">Whitelines Technicians</a></li>
    <li><a class="dropdown-item" href="{{ route('bltec.employees')}}">Brownlines Technicians</a></li>
    <li><a class="dropdown-item" href="{{ route('mechanic.employees')}}">Mechanics</a></li>
    <li><a class="dropdown-item" href="{{ route('workex.employees')}}">Work Experts</a></li>
    </ul>
</div>
<a href="{{ route('customerslist')}}">
    <div class="messages childs">
        <i class="fa-solid fa-envelope icons"></i><p class="text">Customers</p>
    </div>
</a>
    <a href="{{ route('manager.profile') }}">
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