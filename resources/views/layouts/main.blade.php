<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs - Syscom LLC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
            <div class="container">
                <button class="navbar-toggler me-2" role="button" data-bs-toggle="offcanvas" href="#MobileSidebar"
                    aria-expanded="false" aria-label="Toggle navigation" aria-controls="MobileSidebar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img loading="lazy" src="https://www.sysllc.com/wp-content/uploads/2018/12/web-main-1.png"
                        alt="Syscom Logo" height="40">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('home') }}">HOME</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('all.posts') ? 'active' : '' }}"
                                aria-current="page" href="{{ route('show.posts') }}">POSTS</a></li>
                        @guest
                            <li class="nav-item"><a
                                    class="nav-link {{ request()->routeIs('register', 'login') ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('register') }}">LOGIN/REGISTER</a></li>
                        @endguest

                        @auth
                            <li class="nav-divider"></li>
                            <li class="nav-item dropdown d-flex align-items-center">
                                <a class="nav-link dropdown-toggle p-0 ms-3" href="#" role="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">

                                    <img @if (Auth::user()->profile_picture) src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                    @else
                                    src="{{ asset('assets/images/user_avatar.png') }}" @endif
                                        alt="{{ Auth::user()->name }}" class="rounded-circle" width="40" height="40"
                                        style="object-fit: cover;">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3">

                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('user.profile', ['id' => Auth::id()]) }}">
                                            <i class="bi bi-person me-2"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('create.post') }}">
                                            <i class="bi bi-plus-square me-2"></i> Create Post
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center"
                                            href="{{ route('user.posts', ['id' => Auth::id()]) }}">
                                            <i class="bi bi-file-earmark-text me-2"></i> My Posts
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item d-flex align-items-center text-danger " href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                                        </a>
                                    </li>

                                </ul>
                            </li>

                        @endauth



                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="MobileSidebar" aria-labelledby="MobileSidebar"
        style="width: 19rem">

        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-3">



            <!-- User Info (Visible if logged in) -->
            <div class="d-flex align-items-center mb-4">
                @auth


                    <img onclick="window.location.href='{{ route('user.profile', Auth::id()) }}'"
                        src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="{{ Auth::user()->name }}"
                        class="rounded-circle me-3" width="50" height="50" style="object-fit: cover;">
                    <div>

                        <div onclick="window.location.href='{{ route('user.profile', Auth::id()) }}'" class="fw-bold">
                            {{ Auth::user()->name }}</div>
                        <small class="text-muted">{{ Auth::user()->email }}</small>
                    @endauth

                    @guest
                        <img onclick="window.location.href='{{ route('login') }}'"
                            src="{{ asset('assets/images/user_avatar.png') }}" alt="User Name"
                            class="rounded-circle me-3" width="50" height="50" style="object-fit: cover;">
                        <div>

                            <div onclick="window.location.href='{{ route('login') }}'" class="fw-bold">Hello User</div>
                            <small class="text-muted">Welcome to Syscom Blogs</small>
                        @endguest

                    </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('home') }}"
                            class="nav-link text-dark {{ request()->routeIs('home') ? 'active text-white' : '' }} ">
                            <i class="bi bi-house me-2"></i> Home
                        </a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('show.posts') }}"
                            class="nav-link text-dark {{ request()->routeIs('show.posts') ? 'active text-white' : '' }} ">
                            <i class="bi bi-journal me-2"></i> Posts
                        </a>
                    </li>


                    <li class="nav-item mb-2">
                        <a href="{{ route('create.post') }}"
                            class="nav-link text-dark {{ request()->routeIs('create.post') ? 'active text-white' : '' }}">
                            <i class="bi bi-plus-square me-2"></i> Create Post
                        </a>
                    </li>
                    @auth
                        <li class="nav-item mb-2">
                            <a href="{{ route('user.posts', ['id' => Auth::id()]) }}"
                                class="nav-link text-dark {{ request()->routeIs('user.posts') ? 'active text-white' : '' }}">
                                <i class="bi bi-file-earmark-text me-2"></i> My Posts
                            </a>
                        </li>
                    @endauth

                </ul>

                @auth
                    <!-- Optional Logout -->
                    <div class="mt-auto pt-3 border-top">
                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="CSRF_TOKEN_HERE">
                        </form>
                        <a href="#" class="nav-link text-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </a>
                    </div>
                @endauth

                @guest
                <div class="mt-auto pt-3 border-top">

                    <a href="{{route('login')}}" class="nav-link">
                        <i class="bi bi-box-arrow-in-left me-2"></i> Login/Register
                    </a>
                </div>
                @endguest


            </div>
        </div>



        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>There were some issues with your input:</strong>
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        @yield('content')


        <footer class="bg-light text-center text-muted py-3 mt-5 border-top">
            <div class="container">
                <p class="mb-1">
                    Developed by <strong class="text-dark">Kunal Pandharkar.</strong>
                </p>
                <small class="text-secondary">Syscom LLC</small>
            </div>
        </footer>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>
