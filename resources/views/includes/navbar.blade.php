<nav
    class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-auto container">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="{{ route('home') }}">
            Budi Luhur Library
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ms-3">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link me-2" href="{{ route('bookselves') }}"> Books
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link me-2" href="{{ route('categories') }}"> Category
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link me-2" href="" style="margin-top: -13px">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle " data-bs-toggle="dropdown"
                                id="navbarDropdownMenuLink2" style="box-shadow: none; font-size:14px">
                                Service
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                <li>
                                    <a href="{{ route('facility') }}"class="dropdown-item py-3">
                                        Facility
                                    </a>
                                    <a href="{{ route('time-operational') }}"class="dropdown-item py-3">
                                        Time operational
                                    </a>
                                    <a href="{{ route('membership') }}"class="dropdown-item py-3">
                                        Terms of membership
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link me-2" href="{{ route('visi-misi') }}"> Visi-misi
                    </a>
                </li>
                @auth
                    <li class="nav-item ms-3">
                        <a class="nav-link me-2" href="" style="margin-top: -13px">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle " data-bs-toggle="dropdown"
                                    id="navbarDropdownMenuLink2" style="box-shadow: none">
                                    <strong style="font-size: 14px">{{ Auth::user()->name }}</strong>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                                    @if (Auth::user()->roles == 'admin')
                                        <li>
                                            <a href="{{ route('dashboard') }}" class="dropdown-item py-3"><i
                                                    class="bi bi-speedometer2"></i> Dashboard</a>
                                        </li>
                                    @endif
                                    <li>
                                        <form action="{{ url('logout') }}" method="POST">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                <button class="btn btn-danger" type="submit" style="width: 100%;">
                                                    Logout
                                                </button>
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link me-2" href="/register">
                            <i class="fas fa-user-circle opacity-6 text-dark me-1"></i> Sign Up
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="/login">
                            <i class="fas fa-key opacity-6 text-dark me-1"></i> Sign In
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
