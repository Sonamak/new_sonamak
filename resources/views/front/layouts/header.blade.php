<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="Sonamak" />
<meta name="keywords" content="@yield('keywords', seo_default_keywords())">
<meta name="description" content="@yield('description')">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ app()->make('setup',['type' => 'favicon'])[0]; }}" type="image/x-icon"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
<!-- Document title -->
<title>{{ env('APP_NAME') }} | @yield('title')</title>
<link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">