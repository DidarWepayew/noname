<nav class="navbar navbar-expand-lg navbar-dark bg-black" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand {{ request()->routeIs('home') ? 'link-danger':'' }}" href="{{ route('home') }}">@lang('app.appName')</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('cars.index') ? 'link-danger':'' }}" href="{{ route('cars.index') }}">
                        <i class="bi-search"></i> Search
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>