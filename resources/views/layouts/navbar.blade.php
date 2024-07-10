<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>SewuFarm</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="/posts">Blog</a></li>
                <li class="dropdown"><a href="#"><span>Categories</span> <i
                            class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        @foreach ($categories as $item)
                            <li><a href="/posts?category={{ $item->slug }}">{{ $item->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </nav><!-- .navbar -->

        <div class="position-relative">
            @auth
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }}
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My
                            Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                Logout</button>
                        </form>
                    </li>
                </ul>
            @else
                <a href="{{ route('login') }}" class="mx-2"><i class="bi bi-box-arrow-in-right"></i> Sign In</a>
            @endauth

            <a href="#" class="mx-2 js-search-open"><span></span></a>
            <i class="bi bi-list mobile-nav-toggle"></i>

            <!-- ======= Search Form ======= -->
            <div class="search-form-wrap js-search-form-wrap">
                <form action="/posts" class="search-form">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @elseif (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <span class="icon bi-search"></span>
                    <input type="text" placeholder="Search" class="form-control" value="{{ request('search') }}">
                    <button class="btn js-search-close" type="submit"><span class="bi-search"></span></button>
                </form>

                <div id="searchResults"></div>
            </div><!-- End Search Form -->

        </div>

    </div>

</header><!-- End Header -->
