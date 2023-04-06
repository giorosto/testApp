<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse show" id="navbarNav">
        <ul class="navbar-nav">
            @role('writer|admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Blogs
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('admin.blog.create') }}">
                        <i class="fa fa-plus"></i> Create
                    </a>
                    <a class="dropdown-item" href="{{ route('admin.blog.view') }}">
                        <i class="fa fa-folder"></i> list
                    </a>
                </div>
            </li>
            @endrole
            @role('admin')
                <li class="nav-item">
                    <a class="nav-link " href="{{route('admin.users.index')}}">
                        users
                    </a>

                </li>
            @endrole
        </ul>
    </div>
</nav>
