@php
$links = [
    [
        'href' => 'dashboard',
        'text' => 'Dashboard',
        'is_multi' => false,
    ],
    [
        'href' => [
            [
                'section_text' => 'User',
                'section_list' => [['href' => 'user', 'text' => 'Data User'], ['href' => 'user.new', 'text' => 'Create User']],
                'section_icon' => 'fas fa-user',
            ],
            [
                'section_text' => 'Changelog',
                'section_list' => [['href' => 'changelog', 'text' => 'Data Changelog'], ['href' => 'changelog.new', 'text' => 'Create Changelog']],
                'section_icon' => 'fas fa-sync',
            ],
            [
                'section_text' => 'Category',
                'section_list' => [['href' => 'category', 'text' => 'Data Category'], ['href' => 'category.new', 'text' => 'Create Category']],
                'section_icon' => 'fas fa-book-open',
            ],
            [
                'section_text' => 'Api',
                'section_list' => [['href' => 'api', 'text' => 'Data Api'], ['href' => 'api.new', 'text' => 'Create Api']],
                'section_icon' => 'fas fa-fire',
            ],
        ],

        'text' => 'Admin',
        'is_multi' => true,
    ],
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
            <ul class="sidebar-menu">
                <li class="menu-header">{{ $link->text }}</li>
                @if (!$link->is_multi)
                    <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route($link->href) }}"><i
                                class="fas fa-fire"></i><span>Dashboard</span></a>
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
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                                    class="{{ $section->section_icon }}"></i>
                                <span>{{ $section->section_text }}</span></a>
                            <ul class="dropdown-menu">
                                @foreach ($section->section_list as $child)
                                    <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link"
                                            href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        @endforeach
    </aside>
</div>
