@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
    <x-slider-component></x-slider-component>
    <x-tour-slider :feature="true"></x-tour-slider>
@endsection