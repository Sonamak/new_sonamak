@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
    <x-slider-component></x-slider-component>
    <x-tour-slider :feature="true" :subtitle="__('main.choose_from_our_best_tours')" title="feature_tours" ></x-tour-slider>
    <x-destination-component></x-destination-component>
@endsection