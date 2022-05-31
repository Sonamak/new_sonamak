@extends('front.layouts.app')

@section('title')
Contact
@endsection

@section('content')
<!-- Page banner -->
<x-front.contact-banner></x-front.contact-banner>
<!-- end: Page banner -->
<!-- CONTENT -->
<section>
    <div class="container">
        <x-front.contact-us></x-front.contact-us>
    </div>
</section>
<!-- end: Content -->
@endsection

@section('js')
<script type='text/javascript' src='//maps.googleapis.com/maps/api/js?key=AIzaSyCxVeya7QNjxGFskM-_Z70ddVo2kxurGD4'></script>
<script type="text/javascript" src="{{ asset('front/js/gmap3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/map-styles.js') }}"></script>
@endsection