<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div>
<!-- End Map -->
<div class="filters_listing">
    <div class="container">
        <ul class="clearfix"></ul>
    </div>
    <div class="container margin_60_35">
			<form class="ajax-form" action="{{ route('tour.filter') }}" method="post" callback="destinationTourAppendSearch" beforeSend="searchLoading" emptyContainer=".main_search_container">
				<div class="col-lg-12">
					<div class="row no-gutters custom-search-input-2 inner">
						<div class="col-lg-7">
							<div class="form-group">
								<input class="form-control search_name" type="text" placeholder="What are you looking for..." name="name">
								<i class="icon_search"></i>
							</div>
						</div>
						<div class="col-lg-3">
							<select class="wide" name="category">
								<option  value="" @if(!request()->category)) selected @endif class="m-0">
									All Categories
								</option>
								@foreach($categories as $category)
								<option class="{{ get_local($category->name_en,$category->name_fr) }}" value="{{ $category->id }}" @if(request()->category == get_local($category->name_en,$category->name_fr)) selected @endif>
								{{ get_local($category->name_en,$category->name_fr) }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-2">
							<input type="submit" class="btn_search" value="Search">
						</div>
					</div>
					<!-- /row -->
				</div>
                <input type="hidden" value="{{$destination}}" name="destination_id">
			</form>
			<!-- /custom-search-input-2 -->
			
			<div class="wrapper wrapper_container position-relative">
			<div class="circle-side search_more" style="display: none;"></div>
				<div class="main_search_container">
				@foreach($tours as $tour)
				<div class="box_list isotope-item popular">
					<div class="row no-gutters">
						<div class="col-lg-5">
							<figure>
								@if($tour->category)
								<small>
									{{ get_local($tour->category->name_en,$tour->category->name_fr) }}
								</small>
								@endif
								<a href="{{ route('tour.details',['tour'=>$tour->id]) }}">
									<img src="{{ asset('storage/tour/large/'.$tour->background->name) }}" class="img-fluid" alt="" width="800" height="533">
									<div class="read_more"><span>Read more</span></div></a>
							</figure>
						</div>
						<div class="col-lg-7">
							<div class="wrapper">
								<h3>
									<a href="{{ route('tour.details',['tour'=>$tour->id]) }}">
										{{ substr(get_local($tour->title_en,$tour->title_fr),0,80) }}
									</a>
								</h3>
								<p>
									@if(Config::get('app.locale') == 'en')
									{{ substr(strip_tags($tour->description_en),0,300).'...'; }}
									@else 
									{{ substr(strip_tags($tour->description_fr),0,300).'...'; }}
									@endif
								</p>
								<span class="price">{{__('main.from')}}<strong>@if($tour->lowest_price_package) {{ $tour->lowest_price_package_currency }} {{ currency_sympol() }} @else Not Set @endif</strong> /@if($tour->lowest_price_package) {{ __('main.'.$tour->lowest_price_package_room) }} @else Not Set @endif</span>
							</div>
							<ul>
								<li><i class="icon_clock_alt"></i> {{get_local($tour->duration_text_in_en,$tour->duration_text_in_fr)}}</li>
							</ul>
						</div>
					</div>
				</div>
                @endforeach

				@if( ! count($tours) )
				<p class="w-100 text-center font-bold empty_text">No tours found</p>
				@endif
				</div>
			</div>
			<!-- /row -->
			<!-- /isotope-wrapper -->
			@if(count($tours) == 10)
			<p class="text-center">
				<button class="btn_1 rounded add_top_30 load_more py  align-items-center position-relative px-3 py-2">
					<div class="d-inline-flex">
					<img src="{{ asset('storage/system/small/loader.svg') }}" alt="loader" class="d-none mx-2 loader">
					<span class="load_text mt-1">Load more</span>
					</div>
				</button>
			</p>
			@endif
		</div>
    <!-- /container -->
</div>