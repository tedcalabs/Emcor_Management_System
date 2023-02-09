@include('adminx.adminx_base')
  <nav class="navbar">
    <a href=""
        ><img class="logo-img" src="{{asset('assets/images/eclogo12.png')}}" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg  ">
        <li>
            <form method="get" action="{{ route('admin.logout')}}" >
                <button class="  btn btn-info" type="submit">Logout</button>
            </form>
        </li>
    </ul>
</nav>
