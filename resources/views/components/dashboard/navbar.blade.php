<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3 lead" style="background-color: #0000">
        <a class="text-decoration-none" href="https://www.laravel.com" target="_blank" rel="noopener noreferrer">
            <img src="/img/laravel.svg" width="24" alt="">
        </a>
        <a class="text-decoration-none text-white lead h1 fst-italic" href="/">
            Harmonify
        </a>
    </div>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="bg-dark border-0 nav-link px-3">
                    <span>Logout</span>
                    <span data-feather="log-out"></span>
                </button>
            </form>
        </li>
    </ul>
</nav>
