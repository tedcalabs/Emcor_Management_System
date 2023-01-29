<nav class="navbar">
    <a href="/home">
        <img class="logo-img" src="{{asset('assets/images/eclogo12.png')}}"></a>
    <ul class=" ">
        <li>
            <form action="{{ route('logout')}}" method="post">
                @csrf
               
                <button class="text-gray-70  btn" type="submit">Logout</button>

            </form>
        </li>
       </ul>
</nav>
