<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="https://www.laravel.com" target="_blank" rel="noopener noreferrer">
            <img src="img/laravel.svg" width="24" alt="">
        </a>
        <a class="navbar-brand lead fst-italic" href="/">
            Harmonify
        </a>
        <div class="vr d-none d-lg-block mx-3 opacity-25"></div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="text-reset btn-dark text-white" data-bs-dismiss="offcanvas" aria-label="Close">
                  <i class="bi bi-x-lg"></i>
              </button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ ($active === 'home') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($active === 'about') ? 'active' : '' }}" href="/about">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ ($active === 'blog') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/posts">All Posts</a></li>
                            <li><a class="dropdown-item" href="/categories">By Categories</a></li>
                            <li><a class="dropdown-item" href="/authors">By Authors</a></li>
                        </ul>
                    </li>
                    <li class="nav-item opacity-75">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a href="/login" class="nav-link {{ ($active === 'login') ? 'active' : '' }}">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Login</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ ($active === 'dropdown') ? 'active' : '' }}" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome back, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                @can('access_dashboard')
                                <li>
                                    <a class="dropdown-item" href="/dashboard">
                                        <i class="bi-bi-layout-text-sidebar-reverse"></i>
                                        <span>My Dashboard</span>
                                    </a>
                                </li>
                                @endcan
                                {{-- <li>
                                    <a class="dropdown-item" href="/profile">
                                        <span>Profile</span>
                                    </a>
                                </li> --}}
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
