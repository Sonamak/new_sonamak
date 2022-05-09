<!DOCTYPE html>
<html lang="en">
@include('front.layouts.header')
<body>
    <!-- header -->
    <header class="header menu_fixed">
        <div id="preloader"><div data-loader="circle-side"></div></div><!-- /Page Preload -->
        <div id="logo">
            <a href="index.html">
                <img src="@if(app()->make('setup',['type' => 'header logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'header logo'])[0]) }} @else {{ asset('admin/img/brand/logo.png') }} @endif" height="50" alt="" class="logo_normal">
                <img src="@if(app()->make('setup',['type' => 'header logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'header logo'])[0]) }} @else {{ asset('admin/img/brand/logo.png') }} @endif"  height="50" alt="" class="logo_sticky">
            </a>
        </div>
        <!-- /top_menu -->
        <a href="#menu" class="btn_mobile">
            <div class="hamburger hamburger--spin" id="hamburger">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
        </a>
        <nav id="menu" class="main-menu">
            <ul>
                <li><span><a href="index.php">Home</a></span>
                </li>
                <li><span><a href="destinations.php">Destinations</a></span>
                </li>
                <li><span><a href="tours.php">Extra Tours</a></span>
                </li>
                <li><span><a href="blog.php">Blog</a></span>
                </li>
                <li><span><a href="contacts.php">Contact Us</a></span></li>
            </ul>
        </nav>
    </header>
    <!-- /header -->
    @yield('content')
    <div id="toTop"></div><!-- Back to top button -->
    <x-footer-componenet></x-footer-componenet>
    @include('front.layouts.footer')
    @yield('js')
</body>
</html>