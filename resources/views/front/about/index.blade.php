@extends('front.layouts.app')

@section('title')
About Us
@endsection

@section('content')
 <!-- Inspiro Slider -->
 <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
    <!-- Slide 2 -->
    @if($banner)
    <div class="slide kenburns" style="background-image:url(@if($banner) @if($banner->background) {{ asset('storage/banner/large/'.$banner->background->name) }} @endif @endif);">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="slide-captions text-center text-light">
                <!-- Captions -->
                <span class="strong">@if($banner){{$banner->header_text}}@endif</span>
                <h1>@if($banner){{$banner->lower_text}}@endif</h1>
                <!-- end: Captions -->
            </div>
        </div>
    </div>
    <!-- end: Slide 2 -->
    @endif

</div>
<!--end: Inspiro Slider -->

<section>
    <div class="container">
        @if($description)
        <div class="row">
            <div class="col-lg-3">
                <div class="heading-text heading-section">
                    <h2>THE COMPANY</h2>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="about">
                        {!! $description->value !!}
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
</section>


<section class="box-fancy section-fullwidth text-light p-b-0">
    <div class="row">
        @foreach($extras as $extra)
            <div style="background-color:#917d5d" class="col-lg-4">
                <h1 class="text-lg text-uppercase">@if($loop->index < 10) 0 @endif{{ $loop->index + 1}} </h1>
                <h3>{{ $extra->input }}</h3>
                <span>{{ strip_tags($extra->value) }}</span>
            </div>
        @endforeach
    </div>
</section>    

<section class="mt-4 container">
    <div class="row">
        @foreach($badgets as $badget)
        <div class="col-md-3">
            <img src="@if($badget->thumbnail){{ asset('storage/badget/small/'.$badget->thumbnail->name) }}@endif" alt="logo">
        </div>
        @endforeach
    </div>
</section>
@endsection