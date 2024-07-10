<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                {{-- * agar setiap halaman setelah posts link activenya tetap hidup --}}
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
        </ul>
        @can('admin')
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        Post Categories
                    </a>
                </li>
            </ul>
        @endcan
        <ul class="nav flex-column mt-5">
            <li class="nav-item d-flex justify-content-center"> <!-- Menggunakan class d-flex dan justify-content-center -->
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link px-5 bg-dark border-0 text-white text-center">
                        Logout <span data-feather="log-out"></span>
                    </button>
                </form>
            </li>
        </ul>
        
    </div>
</nav>
