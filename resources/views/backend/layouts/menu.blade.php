@php
    $route = request()->route();
@endphp

<li class="nav-header text-uppercase">Basic</li>

<li class="nav-item">
    <a href="{{ route('backend.sites.index') }}" class="nav-link {{ $route->named('home*') ? 'active' : '' }} ">
        <i class="nav-icon fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>



@if (isAdmin())
    <li class="nav-header text-uppercase">User Info</li>
    <li class="nav-item">
        <a href="{{ route('backend.users.index') }}" class="nav-link {{ $route->named('backend.users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>Users</p>
        </a>
    </li>
    <li class="nav-header text-uppercase">Menu</li>

    <li class="nav-item">
        <a href="{{ route('backend.introduction-types.index') }}" class="nav-link {{ $route->named('backend.introductionTypes*') ? 'active' : '' }}">
            <i class="nav-icon far fa-window-restore"></i>
            <p>Introduction Types</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('backend.introductions.index') }}" class="nav-link {{ $route->named('backend.introductions*') ? 'active' : '' }}">
            <i class="nav-icon far fa-window-restore"></i>
            <p>Introductions</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('backend.pages.index') }}" class="nav-link {{ $route->named('backend.pages*') ? 'active' : '' }}">
            <i class="nav-icon far fa-window-restore"></i>
            <p>Pages</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('backend.categories.index') }}" class="nav-link {{ $route->named('backend.categories*') ? 'active' : '' }}">
            <i class="nav-icon far fa-window-restore"></i>
            <p>Categories</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('backend.products.index') }}" class="nav-link {{ $route->named('backend.products*') ? 'active' : '' }}">
            <i class="nav-icon far fa-window-restore"></i>
            <p>Products</p>
        </a>
    </li>
@endif





