@extends('front.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('front/css/owl.css') }}" />
<link rel="stylesheet" href="{{ asset('front/css/pages/home.css') }}" rel="stylesheet" />
@endsection

@section('title')
Home
@endsection

@section('content')
<div class="container">
    <!-- Start: Hero -->
    <x-front.my-slider-component></x-front.my-slider-component>
    <!-- End: Hero -->
    <!-- Our numbers -->
    <x-front.statical-component></x-front.statical-componen>
    <!-- end: Our numbers -->

    <!-- Start: Map -->
   <x-front.map></x-front.map>
    <!-- End: Map-->
    <!-- Start: Our Projects -->
    <x-front.our-project></x-front.our-project>
</div>
<!-- End: Our Projects -->
<!-- Start: Partners -->
<x-front.partner-component></x-front.partner-component>
<!-- End: Partners -->

</section>
</div>

@endsection

@section('js')
<script src="{{ asset('front/js/owl.js') }}"></script>
<script>
    $('.let_talk').on({
        click: function () {
            document.getElementById('contact_form').scrollIntoView({
                behavior: "smooth",
                block: "start",
                inline: "nearest"
            });
        }
    })

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })

</script>
@endsection
