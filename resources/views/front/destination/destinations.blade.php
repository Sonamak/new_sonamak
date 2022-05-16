@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
<x-destination-video></x-destination-video>
<div class="container container-custom margin_80_55 pb-0">
	<section class="add_bottom_45">
		<x-destination-slider></x-detination-slider>
	</section>
</div>
<x-feature-banner></x-feature-banner>
@endsection