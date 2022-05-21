@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
    <section class="hero_in tours_detail start_bg_zoom" style="background: url({{ asset('storage/tour/large/'.$tour->background->name) }} ) center center no-repeat; background-size:cover">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp animated">
                    <span></span>
                    {{ get_local($tour->title_en,$tour->title_fr) }}
                </h1>
            </div>
            <span class="magnific-gallery">
                
            </span>
        </div>
    </section>
    <div class="bg_color_1">
    <nav class="secondary_nav">
				<div class="container">
					<ul class="clearfix">
						<li><a href="#tour_description" class="active">{{__('main.description')}}</a></li>
						<li><a href="#itinerary">{{__('main.itinerary')}}</a></li>
						<li><a href="#inclusions">{{__('main.inclusions')}}</a></li>
						<li><a href="#packages">{{__('main.packages')}}</a></li>
					</ul>
				</div>
			</nav>
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-lg-8">
						<section id="description" style="border-bottom: 0px;">
							@include('front.tour.tour-description')
							@include('front.tour.gallary')
							<!-- /pictures -->
							@include('front.tour.itinerary')
							@include('front.tour.inclutions')
							<!-- /row -->
							
							<hr>
							<div id="location">
							    <h3>Location</h3>
							    <div id="map" class="map map_single add_bottom_30">
									<img src="{{ asset('storage/tour/medium/'.$tour->location->name) }}" class="w-100 h-100">
								</div>
							</div>
							<!-- End Map -->
							@include('front.tour.packages')				
						</section>
						<!-- /section -->
					</div>
					<!-- /col -->
					
					<aside class="col-lg-4" id="sidebar">
						<div class="box_detail booking">
							<div class="form-group input-dates">
								<input class="form-control" type="text" name="dates" placeholder="When..">
								<i class="icon_calendar"></i>
							</div>
							<div class="panel-dropdown">
								<a href="#">Guests <span class="qtyTotal">1</span></a>
								<div class="panel-dropdown-content right">
									<div class="qtyButtons">
										<label>Adults</label>
										<input type="text" name="qtyInput" value="1">
									</div>
									<div class="qtyButtons">
										<label>Childrens</label>
										<input type="text" name="qtyInput" value="0">
									</div>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="name" placeholder="Full Name">
							</div>
							<div class="form-group">
								<input class="form-control" type="email" name="email" placeholder="email">
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="nationality" placeholder="Nationality">
							</div>
							<div class="form-group">
								<input class="form-control" type="text" name="phone" placeholder="Telephone">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="requirments" placeholder="Please advise your tour requirements" ></textarea>
							</div>																																										
							<a href="cart-1.html" class="btn_1 full-width purchase">Submit Inquiry</a>
							<div class="text-center"><small>No money charged in this step</small></div>
						</div>
						<ul class="share-buttons">
							<li><a class="fb-share" href="{{ route('share',['provider' => 'facebook']) }}" target="__blank"><i class="social_facebook"></i> Share</a></li>
							<li><a class="twitter-share" href="{{ route('share',['provider' => 'twitter']) }}" target="__blank"><i class="social_twitter"></i> Tweet</a></li>
						</ul>
					</aside>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
@endsection

@section('js')
<script src="{{ asset('front/js/tabs.js') }}"></script>
<script>new CBPFWTabs( document.getElementById( 'tabs' ) );</script>
@endsection