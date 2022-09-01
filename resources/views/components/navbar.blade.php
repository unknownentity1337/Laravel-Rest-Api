@php
$user = auth()->user();
@endphp

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">

    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-turbolinks="false" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                        class="fas fa-bars"></i></a></li>
        </ul>
        <h1 class="font-weight-bold text-2xl text-white">{{ config('app.name', 'Laravels') }}</h1>
    </form>

    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-turbolinks="false" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (!is_null($user))
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ $user->name }}</div>
            </a>
        @else
            <div class="d-sm-none d-lg-inline-block">Hi, Welcome</div></a>
            @endif
            @if (!is_null($user))
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="/user/profile" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                            onclick="event.preventDefault();this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </form>
                </div>
            @else
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('register') }}" class="dropdown-item has-icon">
                        <i class="fas fa-user-plus"></i>Register
                    </a>
                    <a href="{{ route('login') }}" class="dropdown-item has-icon">
                        <i class="fas fa-sign-in fa-fw"></i>Login
                    </a>
                </div>
            @endif
        </li>
    </ul>
</nav>
