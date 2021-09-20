<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-dark">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('dashboard') ? 'active' : 'text-white' }}" href="/dashboard">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('dashboard/posts*') ? 'active' : 'text-white' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
            @can('superuser')
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('asdfdsf') ? 'active' : 'text-white' }}" href="#">
                    <span data-feather="archive"></span>
                    All Posts
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('dashboard/categories*') ? 'active' : 'text-white' }}" href="/dashboard/categories">
                    <span data-feather="layers"></span>
                    Categories
                </a>
            </li>
            @can('superuser')
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('asdfdsf') ? 'active' : 'text-white' }}" href="#">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-opacity-75 {{ Request::is('asdfdsf') ? 'active' : 'text-white' }}" href="#">
                    <span data-feather="settings"></span>
                    Settings
                </a>
            </li>
            @endcan
        </ul>
    </div>
</nav>