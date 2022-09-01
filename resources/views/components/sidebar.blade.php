{{-- @php
$links = [
    [
        'href' => [
            [
                'section_text' => 'Feature',
                'section_list' => [['href' => 'user.dashboard', 'text' => 'Dashboard'], ['href' => 'user.changelog', 'text' => 'Changelog'], ['href' => 'user.pricing', 'text' => 'Pricing']],
                'section_icon' => 'fas fa-cloud',
            ],
        ],
        'text' => 'Api Azathoth',
        'is_multi' => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp --}}

{{-- <div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('user.dashboard') }}">Api Azathoth</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('user.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">
                <li class="menu-header">{{ $link->text }}</li>
                @if (!$link->is_multi)
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                class="{{ $link->icon }}"></i><span>{{ $link->text }}</span></a>
                    </li>
                @else
                    @foreach ($link->href as $section)
                        @php
                            $routes = collect($section->section_list)
                                ->map(function ($child) {
                                    return Request::routeIs($child->href);
                                })
                                ->toArray();
                            $is_active = in_array(true, $routes);
                        @endphp
                        <li class="dropdown {{ $is_active ? 'active' : '' }}">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"
                                aria-expanded="false"><i class="{{ $section->section_icon }}"></i>
                                <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a
                                            class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div> --}}
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
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('user.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('user.dashboard') }}"><i
                        class="fas fa-cloud"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ Request::routeIs('user.changelog') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown" aria-expanded="false"><i
                        class="fas fa-cloud"></i>
                    <span>Changelog</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::routeIs('user.changelog') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('user.changelog') }}">Changelog</a>
                    </li>

                </ul>
            </li>
        </ul>
    </aside>
</div>
