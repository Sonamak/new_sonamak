@extends('admin.layouts.app')

@section('css')
<link href="{{ asset('admin/css/custom-cards.css') }}" rel="stylesheet" test>
@endsection

@section('content')
<div class="container-fluid mt-2">
    <x-admin.hero-banner></x-admin.hero-banner>
    <x-admin.map-component></x-admin.map-component>
    <x-admin.contact-banner></x-admin.contact-banner>
    <x-admin.about-hero></x-admin.about-hero>
</div>
@endsection