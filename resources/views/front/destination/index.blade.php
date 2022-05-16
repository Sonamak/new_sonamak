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
	page = 1;
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
		tour_wide_box(element,'.main_search_container');
	});

}
</script>
@endsection