<aside class="app-sidebar">
    <div class="main-sidebar-header active">
        <a class="header-logo active" href="index.html">
            <img src="{{ asset('admin/img/brand/logo.png') }}" class="main-logo  desktop-logo" alt="logo">
            <img src="{{ asset('admin/img/brand/logo-white.png') }}" class="main-logo  desktop-dark" alt="logo">
            <img src="{{ asset('admin/img/brand/favicon.png') }}" class="main-logo  mobile-logo" alt="logo">
            <img src="{{ asset('admin/img/brand/favicon-white.png') }}" class="main-logo  mobile-dark" alt="logo">
        </a>
    </div>
    <div class="main-sidemenu">
        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"><path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"/></svg></div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="">
                    <i class="icon ion-md-stats me-2"></i>
                    <span class="side-menu__label">Dashboards</span>
                </a>
            </li>
        </ul>

        @foreach($menus as $menu_key => $menu)
        <ul class="side-menu">
            <li class="side-item side-item-category">{{ $menu_key }}</li>
            @foreach($menu as $item)
            <li class="slide">
                <a class="side-menu__item" data-bs-toggle="slide" href="{{ route(strtolower($item->name)) }}">
                    <i class="{{ $item->icon_class }} me-2"></i>
                    <span class="side-menu__label">{{ ucwords($item->name) }}</span>
                </a>
            </li>
            @endforeach
        </ul>

        @endforeach

    </div>
</aside>