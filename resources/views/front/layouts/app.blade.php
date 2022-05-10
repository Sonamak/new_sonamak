<!DOCTYPE html>
<html lang="en">
@include('front.layouts.header')
<body>
    <!-- header -->
    <header class="header menu_fixed">
        <x-navbar-component></x-navbar-component>
    </header>
    <!-- /header -->
    @yield('content')
    <div id="toTop"></div><!-- Back to top button -->
    <x-footer-componenet></x-footer-componenet>
    @include('front.layouts.footer')
    @yield('js')
</body>
</html>