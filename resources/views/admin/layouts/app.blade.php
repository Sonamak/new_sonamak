<!DOCTYPE html>
<html lang="en">
    @include('admin.layouts.header')
	<body class="ltr main-body app sidebar-mini dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('admin/img/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

			<div>
				<!-- main-header -->
				<div class="main-header side-header sticky nav nav-item">
					<div class=" main-container container-fluid">
						<div class="main-header-left ">
							<div class="responsive-logo">
								<a href="index.html" class="header-logo">
									<img src="{{ asset('admin/img/brand/logo.png') }}" class="mobile-logo logo-1" alt="logo">
									<img src="{{ asset('admin/img/brand/logo-white.png') }}" class="mobile-logo dark-logo-1" alt="logo">
								</a>
							</div>
							<div class="app-sidebar__toggle" data-bs-toggle="sidebar">
								<a class="open-toggle" href="javascript:void(0);"><i class="header-icon fe fe-align-left" ></i></a>
								<a class="close-toggle" href="javascript:void(0);"><i class="header-icon fe fe-x"></i></a>
							</div>
							<div class="logo-horizontal">
								<a href="index.html" class="header-logo">
									<img src="{{ asset('admin/img/brand/logo.png') }}" class="mobile-logo logo-1" alt="logo">
									<img src="{{ asset('admin/img/brand/logo-white.png') }}" class="mobile-logo dark-logo-1" alt="logo">
								</a>
							</div>
							<div class="main-header-center ms-4 d-sm-none d-md-none d-lg-block form-group">
								<input class="form-control" placeholder="Search..." type="search">
								<button class="btn"><i class="fas fa-search"></i></button>
							</div>
						</div>
						<div class="main-header-right">
							<button class="navbar-toggler navresponsive-toggler d-md-none ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon fe fe-more-vertical "></span>
							</button>
						</div>
					</div>
				</div>
				<!-- /main-header -->

				<!-- main-sidebar -->
				<div class="sticky">
                    <x-admin.aside-component></x-aside-component>
				</div>
				<!-- main-sidebar -->
			</div>

			<!-- main-content -->
			<div class="main-content app-content">
				@yield('content')
			</div>
			<!-- /main-content -->

			<!-- Sidebar-right-->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="panel panel-primary card mb-0 box-shadow">
					<div class="tab-menu-heading card-img-top-1 border-0 p-3">
						<div class="card-title mb-0">Notifications</div>
						<div class="card-options ms-auto">
							<a href="javascript:void(0);" class="sidebar-remove"><i class="fe fe-x"></i></a>
						</div>
					</div>
					<div class="panel-body tabs-menu-body latest-tasks p-0 border-0">
						<div class="tabs-menu ">
							<!-- Tabs -->
							<ul class="nav panel-tabs">
								<li class=""><a href="#side1" class="active" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg"  class="side-menu__icon" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg> Chat</a></li>
								<li class=""><a href="#side2" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"  class="side-menu__icon"  height="24" viewBox="0 0 24 24" width="24"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><path d="M12,18.5c0.83,0,1.5-0.67,1.5-1.5h-3C10.5,17.83,11.17,18.5,12,18.5z M12,2C6.48,2,2,6.48,2,12s4.48,10,10,10 c5.52,0,10-4.48,10-10S17.52,2,12,2z M12,20c-4.41,0-8-3.59-8-8s3.59-8,8-8c4.41,0,8,3.59,8,8S16.41,20,12,20z M16,11.39 c0-2.11-1.03-3.92-3-4.39V6.5c0-0.57-0.43-1-1-1s-1,0.43-1,1V7c-1.97,0.47-3,2.27-3,4.39V14H7v2h10v-2h-1V11.39z M14,14h-4v-3 c0-1.1,0.9-2,2-2s2,0.9,2,2V14z"/></g></svg> Notifications</a></li>
								<li class=""><a href="#side3" data-bs-toggle="tab"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  class="side-menu__icon"  height="24" version="1.1" width="24"  viewBox="0 0 24 24"><path d="M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2M7.07,18.28C7.5,17.38 10.12,16.5 12,16.5C13.88,16.5 16.5,17.38 16.93,18.28C15.57,19.36 13.86,20 12,20C10.14,20 8.43,19.36 7.07,18.28M18.36,16.83C16.93,15.09 13.46,14.5 12,14.5C10.54,14.5 7.07,15.09 5.64,16.83C4.62,15.5 4,13.82 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,13.82 19.38,15.5 18.36,16.83M12,6C10.06,6 8.5,7.56 8.5,9.5C8.5,11.44 10.06,13 12,13C13.94,13 15.5,11.44 15.5,9.5C15.5,7.56 13.94,6 12,6M12,11C11.17,11 10.5,10.33 10.5,9.5C10.5,8.67 11.17,8 12,8C12.83,8 13.5,8.67 13.5,9.5C13.5,10.33 12.83,11 12,11Z" /></svg> Friends</a></li>
						    </ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Start: Modals -->
			<!-- Modal -->
			<div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content ">
				<div class="modal-body d-flex justify-content-center flex-column align-items-center">
				<img width="78px" src="{{ asset('storage/system/fixed/warn.png') }}" class="mb-2">
					<p>Slow down howdy,We have to warn you that this action is irreverasble and this data will be permantly delete</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary confirm_btn">Confirm</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
			</div>
            <!-- Footer opened -->
            <div class="main-footer">
                <div class="col-md-12 col-sm-12 text-center">
                    <div class="container-fluid pd-t-0-f ht-100p">
                        Copyright © 2022 <a href="javascript:void(0);" class="text-primary">{{ env('APP_NAME') }}</a>. Designed with <span class="fa fa-heart text-danger"></span> by <a href="javascript:void(0);"> Sonamak </a> All rights reserved
                    </div>
                </div>
			</div>
			<!-- Footer closed -->
		</div>
		<!-- End Page -->

		
		
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-arrow-up"></i></a>
        @include('admin.layouts.footer')

	</body>
</html>