<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description', 'Discover your next destination with us')">
    <meta name="author" content="Sonamak">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ app()->make('setup',['type' => 'website title'])[0]; }} -  @yield('title') </title>
    <!-- Og Meta-->
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:image" content="@yield('image')" />
    <!-- Favicons-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="favicon.ico">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- BASE CSS -->
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('front/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- if page is HOME page -->

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('front/revolution-slider/fonts/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution-slider/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution-slider/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/revolution-slider/css/navigation.css') }}">

    <!-- elseif page is Destinations page -->

    <!-- Modernizr -->
	<script src="{{ asset('front/js/modernizr.js') }}"></script>

    <!-- elseif page is blog page OR blog post page -->

    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    
    <style>
        #testimonials_widget-3 p {
            color: #fff;
        }
    </style>

</head>