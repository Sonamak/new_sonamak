@extends('front.layouts.app')

@section('title') Faq @endsection

@section('content')
@if($about)
<x-faq-hero></x-faq-hero>
<div class="container container-custom margin_80_55 pb-0 summer my-3">
{!! get_local($about->value_en,$about->value_fr) !!}
<div class="clearfix"></div>
</div>
@endif
@endsection