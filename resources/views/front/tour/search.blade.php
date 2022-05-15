@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
<section class="hero_in tours" style="background: url(@if($banner)  {{ asset('storage/banner/large/'.$banner->background->name) }} @endif ) center center no-repeat; background-size:cover">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>{{ get_local($banner->header_text_in_english,$banner->header_text_in_french) }}</h1>
        </div>
    </div>
</section>

<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div>
<!-- End Map -->
<div class="filters_listing sticky_horizontal">
    <div class="container">
        <ul class="clearfix"></ul>
    </div>
    <div class="container margin_60_35">
			<form class="ajax-form" action="{{ route('tour.filter') }}" method="post" callback="tourAppendSearch" beforeSend="searchLoading" emptyContainer=".main_search_container">
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
			</form>
			<!-- /custom-search-input-2 -->
			
			<div class="wrapper wrapper_container position-relative">
			<div class="circle-side search_more" style="display: none;"></div>
			<div class="row main_search_container">
				@foreach($tours as $tour)
                <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                    <x-tour-slider-box :tour="$tour"></x-tour-slider-box>
				</div>
                @endforeach
			</div>
			<!-- /row -->
			</div>
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
@endsection

@section('js')
<script>
let page = 1;
$('.search_name').on('click',function(){
	
});

$('.load_more').on('click',function(){
	page++;
	$('.load_text').addClass('px-4')
	$('.loader').removeClass('d-none');

	$.ajax({
		url: `{{route('tour.filter')}}?page=${page}`,
		method: 'post',
		success: (e) => {
			tourAppendSearch(e);
			$('.load_text').removeClass('px-4');
			$('.loader').addClass('d-none');
		}
	})
})

function searchLoading()
{
	$('.main_search_container').html('');
	$('.search_more').css('display','block');
	$('.load_more').css('display','none !important');
	$('.empty_text').remove();
	$('.wrapper').addClass('h_half');
}

function tourAppendSearch(e)
{
	let payload = e.data;

	$('.wrapper_container').removeClass('h_half');
	$('.search_more').css('display','none');

	if ( payload.length == 10) {
		$('.load_more').css('display','inline-block');
	} else {
		$('.load_more').css('display','none')
	}

	if ( !payload.length  && !$('.main_search_container').children()) {
		$('.wrapper_container').append(
			`
			<p class="w-100 text-center font-bold empty_text">No tours found</p>
			`
		);

		$('.wrapper_container').css('min-height','50vh')
	} 

	payload.forEach(element => {
		console.log(element)
		let name = ( $('html').attr('lang') == 'en') ? element.title_en : element.title_fr;
		let thumbnail = element.gallaries.find(x => x.use_for == 'thumbnail');
		let description =  ( $('html').attr('lang') == 'en') ? element.description_en.replace(/<[^>]*>?/gm, '') : element.description_fr.replace(/<[^>]*>?/gm, '');
		let category = null;
		let currency = "";
		let lowest_price = "Not Set";
		let room = "Not Set"; 
		let duration = ( $('html').attr('lang') == 'en') ? element.duration_text_in_en : element.duration_text_in_fr;

		if (element.category) {
			let category = ( $('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_fr;
		}
		
		if ( element.lowest_price_package ) {
			currency = "{{get_currency()}}";

			if ( currency == 'cad' )  {

				lowest_price = element.lowest_price_package.cad_price;
				room = element.lowest_price_package.room_type;

			} else if ( currency == 'usd' ) {

				lowest_price = element.lowest_price_package.usd_price;
				room = element.lowest_price_package.room_type;

			} else {

				lowest_price = element.lowest_price_package.eur_price;
				room = element.lowest_price_package.room_type;

			}

			room = room.toLowerCase().replace(' ','_')


			console.log(room)
		}
		if ( element.category) {
			category = ( $('html').attr('lang') == 'en') ? element.category.name_en : element.category.name_en
		}

		$('.main_search_container').append(
			`
			<div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
				<div class="box_grid">
					<figure>
						<a href="tour-details.php">
							<img src="/storage/tour/medium/${thumbnail.name}" class="img-fluid"
								alt="" width="800" height="533">
							<div class="read_more">
								<span>Read more</span>
							</div>
						</a>
						<small>
							${category}
						</small>
					</figure>
					<div class="wrapper">
						<h3>
							<a href="tour-details.php">
								${name}
							</a>
						</h3>
						<p>
							${description.substring(0,40)}
						</p>
						<span class="price">{{__('main.from')}}<strong> ${lowest_price + ' ' + currency} </strong> /  </strong> ${get_local(room)}</span>
					</div>
					<ul class="d-flex">
						<li><i class="icon_clock_alt mx-2"></i>${duration}</li>
					</ul>
				</div>
			</div>

			`
		)
	});

}
</script>
@endsection