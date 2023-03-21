@section('sidebarT')

<div class="mainbody">
    <div class="close slider ">
        <div class="profile">
            <img src=" {{asset('assets/images/user.png')}}" alt="profileImage" class="image">
            <div class="profileText">
                <p class="text maintext">{{Auth::user()->name}}</p>
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
        <a href="{{ route('tech.sched') }}">
        <div class="messages childs">
            <i class="fa-solid fa-envelope icons"></i><p class="text">Schedules</p>
        </div>
    </a>
        <div class="logout childs">
 
          <form action="{{ route('logout')}}" method="post">
             @csrf
            
             <i class="fa-solid fa-right-from-bracket icons"></i><button class="text" type="submit">Logout</button>
 
         </form>
      
 </div>
 </div>
</div>

@endsection