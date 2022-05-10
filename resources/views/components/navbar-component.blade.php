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
        @foreach($navbar_links as $navbar_link)
        <li>
            <span>
                <a href="index.php">{{ __('main.'.$navbar_link->page) }}</a>
            </span>
        </li>
        @endforeach
    </ul>
</nav>