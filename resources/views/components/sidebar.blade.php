<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('user.dashboard') }}">Api Azathoth</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('user.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Feature</li>
            <li class="{{ Request::routeIs('user.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.dashboard') }}"><i
                        class="fas fa-tachometer-alt-average"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::routeIs('guest.pricing') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('guest.pricing') }}"><i
                        class="far fa-money-bill-alt"></i><span>Pricing</span></a>
            </li>
            <li class="{{ Request::routeIs('guest.changelog') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('guest.changelog') }}"><i
                        class="fas fa-sync"></i><span>Changelog</span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Docs</li>
            <li class="{{ Request::routeIs('example') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('example') }}"><i class="fas fa-code"></i><span>Example Code</span></a>
            </li>
            <li class="{{ Request::routeIs('docs.all') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('docs.all') }}"><i class="fas fa-fire"></i><span>Api's</span></a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="menu-header">Category</li>
            <li class="{{ Request::segment(2) == 'film' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('docs.category', ['category' => 'film']) }}"><i
                        class="fas fa-video"></i><span>Film</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'anime' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('docs.category', ['category' => 'anime']) }}"><i
                        class="fas fa-user"></i><span>Anime</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'downloader' ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('docs.category', ['category' => 'downloader']) }}"><i
                        class="fas fa-download"></i><span>Downloader</span></a>
            </li>
        </ul>
        {{-- <ul class="sidebar-menu">
            <li class="menu-header">Category</li>
            @foreach ($ct as $c)
                <li class="{{ Route::is('docs.film') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('docs.' . $c->slug, $c->slug) }}">{!! $c->icon !!}<span>{{ $c->title }}</span></a>
                </li>
            @endforeach --}}

        {{-- <li class="dropdown {{ Request::routeIs('user.changelog') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" aria-expanded="false"><i
                        class="fas fa-sync"></i>
                    <span>Changelog</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::routeIs('user.changelog') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('user.changelog') }}">Changelog</a>
                    </li>
                </ul>
            </li>
        </ul> --}}
    </aside>
</div>
