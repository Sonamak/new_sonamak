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

<ul class="info_menu me-3 d-flex  mx-4 " id="top_menu">
    <li class="position-relative dropdown_nav" data-toggle="modal" data-target="#exampleModal"> 
        <ion-icon name="earth-outline" style="font-size:20px"></ion-icon>
        @if(app()->make('saved_cookie',['type' => 'language']) == 'en')  
        <span class="positin-absolute uppercase local_title text-uppercase">en</span>
        @endif
        @if(app()->make('saved_cookie',['type' => 'language']) == 'fr')  
        <span class="positin-absolute uppercase local_title text-uppercase">fr</span>
        @endif
        <ul class="sub_menu">
            <li class="switch" type="language" value="en">
                <a href="{{ route('language',['language' => 'en']) }}" class="d-flex">
                    <img src="{{ asset('storage/system/small/en.png') }}" alt="en" class="flag">
                    <span>English</span>
                </a>
            </li>
            <li class="" type="language" value="fr">
                <a href="{{ route('language',['language' => 'fr']) }}">
                    <img src="{{ asset('storage/system/small/fr.png') }}" alt="fr" class="flag">
                    <span>French</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="position-relative dropdown_nav">
        @if(get_currency() == 'usd')
        <img src="{{ asset('storage/system/small/usd1.svg') }}" class="currency_symbol light">
        @elseif(get_currency() == 'eur')
        <img src="{{ asset('storage/system/small/er1.svg') }}" class="currency_symbol light">
        @else
        <img src="{{ asset('storage/system/small/cd1.svg') }}" class="currency_symbol light">
        @endif

        @if(get_currency() == 'usd')
        <img src="{{ asset('storage/system/small/usd.svg') }}" class="currency_symbol dark">
        @elseif(get_currency() == 'eur')
        <img src="{{ asset('storage/system/small/er.svg') }}" class="currency_symbol dark">
        @else
        <img src="{{ asset('storage/system/small/cd.svg') }}" class="currency_symbol dark">
        @endif
        <ul class="sub_menu">
            <li class="switch" type="currency" value="cad">
                <a href="{{ route('currency',['currency' => 'cad']) }}" class="d-flex">
                    <img src="{{ asset('storage/system/small/cd.svg') }}" alt="en" class="flag">
                    <span>CAD</span>
                </a>
            </li>
            <li class="switch" type="currency" value="usd">
                <a href="{{ route('currency',['currency' => 'usd']) }}" class="d-flex">
                    <img src="{{ asset('storage/system/small/usd.svg') }}" alt="fr" class="flag">
                    <span>USD</span>
                </a>
            </li>
            <li class="switch" type="currency" value="eur">
                <a href="{{ route('currency',['currency' => 'eur']) }}">
                    <img src="{{ asset('storage/system/small/er.svg') }}" alt="er" class="flag">
                    <span>EUR</span>
                </a>
            </li>
        </ul>
    </li>
</ul>


<nav id="menu" class="main-menu d-flex">
    <ul class="nav-menu mx-5">
        @foreach($navbar_links as $navbar_link)
        <li>
            <span>
                <a href='{{ route("$navbar_link->page") }}'>{{ __('main.'.$navbar_link->page) }}</a>
            </span>
        </li>
        @endforeach
    </ul>
</nav>
<!-- Nav Models -->