<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
	
		<!-- Title -->
        <title> {{ app()->make('setup',['type' => 'website title'])[0]; }} -  Adminpanal </title>

		<!-- Favicon -->
        <link rel="icon" href="@if(app()->make('setup',['type' => 'short logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'short logo'])[0]) }} @else {{ asset('admin/img/brand/favicon.png') }} @endif " type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet">

		<!--  bootstrap css-->
		<link href="{{ asset('admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

		<!--  Right-sidemenu css -->
		<link href="{{ asset('admin/plugins/sidebar/sidebar.css') }}" rel="stylesheet">

		<!-- P-scroll bar css-->
		<link href="{{ asset('admin/plugins/perfect-scrollbar/p-scrollbar.css') }}" rel="stylesheet" />

		<!--- Style css --->
		<link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('admin/css/style-dark.css') }}" rel="stylesheet">
		<link href="{{ asset('admin/css/style-transparent.css') }}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{ asset('admin/css/skin-modes.css') }}" rel="stylesheet" />

		<!--- Animations css-->
		<link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">

	</head>
	<body class=" ltr error-page1 bg-primary dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('admin/img/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<div class="square-box">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		<div class="page" >
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 card-sigin-main mx-auto my-auto py-4 justify-content-center">
							<div class="card-sigin">
								 <!-- Demo content-->
								 <div class="main-card-signin d-md-flex">
									 <div class="wd-100p"><div class="d-flex mb-4"><a href="index.html"><img src="@if(app()->make('setup',['type' => 'short logo'])[0])  {{ asset('storage/system/small/'.app()->make('setup',['type' => 'short logo'])[0]) }} @else {{ asset('admin/img/brand/favicon.png') }} @endif " class="sign-favicon ht-40" alt="logo"></a></div>
										 <div class="">
											@yield('content')
										 </div>
									 </div>
								 </div>
							 </div>
						 </div>
					</div>
				</div>
			</div>
		</div>

		<!-- JQuery min js -->
		<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>

		<!-- Bootstrap js -->
		<script src="{{ asset('admin/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- Ionicons js -->
		<script src="{{ asset('admin/plugins/ionicons/ionicons.js') }}"></script>

		<!-- Moment js -->
		<script src="{{ asset('admin/plugins/moment/moment.js') }}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('admin/js/eva-icons.min.js') }}"></script>

		<!-- generate-otp js -->
		<script src="{{ asset('admin/js/generate-otp.js') }}"></script>

		<!--Internal  Perfect-scrollbar js -->
		<script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

		<!-- Theme Color js -->
		<script src="{{ asset('admin/js/themecolor.js') }}"></script>

		<!-- custom js -->
		<script src="{{ asset('admin/js/custom.js') }}"></script>

	</body>
</html>