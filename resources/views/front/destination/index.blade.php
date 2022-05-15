@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
<section class="hero_in tours" style="background:{{ asset('storage/destination/large/'.$destination->thumbnail->name) }} ) center center no-repeat; background-size:cover">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp"><span></span>{{__('main.discover_country_tours',['country' =>  get_local($destination->country_name_en,$destination->country_name_fr) ])}}</h1>
        </div>
    </div>
</section>
<x-destination-search-component :destination="$destination->id"/>
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

function destinationTourAppendSearch(e)
{
	let payload = e.data;

	$('.wrapper_container').removeClass('h_half');
	$('.search_more').css('display','none');

	if ( payload.length == 10) {
		$('.load_more').css('display','inline-block');
	} else {
		$('.load_more').css('display','none')
	}
	console.log( !payload.length  , !$('.main_search_container').children().length)
	if (!payload.length  && !$('.main_search_container').children().length ) {
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
			<div class="box_list isotope-item popular">
			<div class="row no-gutters">
					<div class="col-lg-5">
						<figure>
							<small>
								${category}
							</small>
							<a href="tour-details.php">
								<img src="/storage/tour/medium/${thumbnail.name}" class="img-fluid" alt="" width="800" height="533">
								<div class="read_more"><span>Read more</span></div>
							</a>
						</figure>
					</div>
					<div class="col-lg-7">
						<div class="wrapper">
							<h3><a href="tour-details.php">${name}</a></h3>
							<p>
							${description.substring(0,40)}
							</p>
							<span class="price">{{__('main.from')}}<strong> ${lowest_price + ' ' + currency} </strong> /  </strong> ${get_local(room)}</span>
						</div>
						<ul>
							<li><i class="icon_clock_alt mx-2"></i>${duration}</li>
						</ul>
					</div>
				</div>
				</div>
			`
		)
	});

}
</script>
@endsection