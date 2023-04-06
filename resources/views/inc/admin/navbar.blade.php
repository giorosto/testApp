<nav class="navbar navbar-expand-lg navbar-dark bg-transparent pl-0">
    <ul class="navbar-nav mr-auto">

        <li class="nav-item ">
            <a class="nav-link disabled" href="#">{{Request::path()}}</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>

    </ul>

</nav>
