@section('adminSidebar')

<div class="sidebar">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/eclogo12.png')}}" alt="profileImage" class="emlog">
        
        </div>
        <div class="profile">
            <img src="{{  asset('uploads/profile/'.Auth::guard('admin')->user()->picture) }}" alt="profileImage" class="image">
            <div class="profileText">
             
                <p class="maintext">{{Auth::guard('admin')->user()->name}}</p>
              
            </div>
        </div>
        <div class="user-label">
           
            <p class="headtext" >Admin</p>
        </div>
 
        <a href="{{route('admin.dashboard')}}">
        <div class="dashboard childs">
            <i class="fa-solid fa-house icons"></i><p class="text">Dashboard</p>
        </div></a>

<a href="{{route('categories.index')}}">
        <div class="notifications childs">
            <i class="fa-solid fa-bars icons"></i><p class="text">Services Categories</p>
        </div></a>


<a href="{{route('services.index')}}">
        <div class="messages childs">
            <i class="fa-solid fa-dollar icons"></i><p class="text">Services</p>
        </div></a>
        <div class="notifications childs">
            <i class="fa-solid fa-bell icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Activity Logs
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('duma.mtnc.request')}}">Dumaguete Branch</a></li>
            <li><a class="dropdown-item" href="{{route('bayawan.mtnc.request')}}">Bayawan Branch</a></li>
            </ul>
        </div>

        <div class="notifications childs">
            <i class="fa-solid fa-users icons"></i><p  class="text dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            User Management
            </p>
            <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{route('users.index')}}">Dumaguete Branch</a></li>
            <li><a class="dropdown-item" href="{{route('usersbyn.index')}}">Bayawan Branch</a></li>
            </ul>
        </div>

        <a href="{{route('policies.index')}}">
            <div class="messages childs">
                <i class="fa-solid fa-tools icons"></i><p class="text">Warranty and Policy</p>
            </div></a>
<a href="{{route('admin.profile')}}">
        <div class="heart childs">
            <i class="fa-regular fa-user icons"></i><p class="text">Profile</p>
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