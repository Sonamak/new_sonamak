<!DOCTYPE html>
<html lang="{{app()->make('saved_cookie',['type' => 'language'])}}" currency="{{app()->make('saved_cookie',['type' => 'currency'])}}">
@include('front.layouts.header')
<body>
    <!-- header -->
    <header class="header menu_fixed" html="{{app()->make('saved_cookie',['type' => 'language'])}}">
        <x-navbar-component></x-navbar-component>
    </header>
    <!-- /header -->
    @yield('content')
    <x-trip-advisor></x-trip-advisor>
    <div id="toTop"></div>
    <x-models.inquiry></x-models.inquiry>
    <x-footer-componenet></x-footer-componenet>
    @include('front.layouts.footer')
    @yield('js')
</body>
</html>