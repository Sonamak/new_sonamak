<!DOCTYPE html>
<html lang="en">

<head>
@include('front.layouts.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MRCJX96KZ1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MRCJX96KZ1');
</script>
@yield('css')
</head>

<body>
    <!-- Body Inner -->
    <div class="body-inner">
        <!-- Header -->
        <div class="container">
            <header id="header" class="container-fluid" data-fullwidth="true" data-transparent="true" class="dark">
                <div class="header-inner">
                    <div class="container">
                        <!--Logo-->
                        <div id="logo">
                            <a href="/">
                                <div class="logo-default">
                                    <img src="@if(app()->make('setup',['type' => 'header logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'header logo'])[0]) }} @else {{ asset('admin/img/brand/logo.png') }} @endif" alt="logo" width="165" height="52">
                                </div>
                                <div class="logo-dark">
                                    <img src="@if(app()->make('setup',['type' => 'header logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'header logo'])[0]) }} @else {{ asset('admin/img/brand/logo.png') }} @endif" alt="logo" width="165" height="52">
                                </div>
                            </a>
                        </div>
                        <!--End: Logo-->
                        
                        <!--Navigation Resposnive Trigger-->
                        <div id="mainMenu-trigger">
                            <a class="lines-button x" aria-label="menukey" href="#"><span class="lines"></span></a>
                        </div>
                        <!--end: Navigation Resposnive Trigger-->
                        <!--Navigation-->
                        <div id="mainMenu">
                            <div class="container">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}">Home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('projects.all') }}">Our Portfolio</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('contact.us') }}">Contact Us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--end: Navigation-->
                    </div>
                </div>
            </header>
        </div>
        <!-- end: Header -->
        <div class="main_content">
            @yield('content')
        </div>
    </div>
    <x-front.footer-component></x-front.footer-component>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop" aria-label="scroll" href="#"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    @include('front.layouts.footer')
    @yield('js')
</body>

</html>