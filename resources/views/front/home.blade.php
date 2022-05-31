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
    <div class="container-fluid">
        <div class="screen_height slider d-flex align-items-center">
            <div class="row main_container">
                <div class="col-lg-6">
                    <div class="slider_text">
                        <h1 class="top-slider__title section-title">
                            {{ $banner->header_text }}
                        </h1>
                        <p class="sub_title">
                            {{ $banner->lower_text }}
                        </p>
                    </div>
                    <div class="d-flex mx-2 let_talk">
                        <button class="btn btn-primary">{{ $banner->btn_text }}</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main_container">
                        <div class="outer_frame position-relative d-flex justify-content-center align-items-center">
                            <div class="outer_spinner  position-absolute">

                            </div>
                            @if($banner->background)
                            <img src="{{ asset('storage/banner/large/'.$banner->background->name) }}"
                                alt="graphic_design" class="w-100" width="497" height="233">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Hero -->
    <!-- Our numbers -->
    <section class="p-t-200 p-b-200">
        <div class="xs-text-center sm-text-center">
            <div class="row justify-content-center">
                @foreach($staticals as $statical)
                <div class="col-lg-4 col-md-4">
                    <div class="text-center d-flex flex-column">
                        <div class="counter text-lg"> <span data-speed="3000" data-refresh-interval="50"
                                data-to="{{ $statical->number }}" data-from="0" data-seperator="true"></span> </div>
                        <div class="seperator seperator-small"></div>
                        <p class="font-bold text-uppercase">{{ $statical->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- end: Our numbers -->

    <!-- Start: Map -->
    <section class="customer_map mb-5 pt-5">
        @if($map->background->name)
        <img src="{{ asset('storage/banner/large/'.$map->background->name) }}" alt="our customer">
        @endif
    </section>
    <!-- End: Map-->
    <!-- Start: Our Projects -->
    <section class="mt-3">
        <div class="row">
            @foreach($projects as $project)
            <div class="col-md-6 mt-3">
                <div class="project_container w-100" style="background: {{ $project->background }} " ;>
                    <div class="d-flex justify-content-center">
                        <div class="project_info w-50 pt-3">
                            <h2 class="text-white font-bold project_name">{{ ucfirst($project->title) }}</h2>
                            <div class="project_tecnologies mt-4">
                                <h3 class="project_subtitle text-white">Technologies</h3>
                                <p class="">{{ ucfirst($project->tecnology) }}</p>
                            </div>
                            <div class="project_languagies mt-5">
                                <h3 class="project_subtitle text-white">Languages</h3>
                                @foreach($project->coders as $coder)
                                <p>{{ ucfirst($coder->name) }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="mockup_layout w-50">
                            <img src="@if($project->mockup) {{ asset('storage/project/large/'.$project->mockup->name) }} @else {{ asset('storage/system/large/project_mockup.png') }} @endif"
                                alt="mockup" class="my-auto w-100">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="w-50">
                            <a href="{{ route('project.show',['project'=>$project->id]) }}">
                                <button class="btn btn-primary text-white">
                                    View Project
                                </button>
                            </a>
                        </div>
                        <div class="coders_logos w-50">
                            <div class="row justify-between w-100 ps-5">
                                @foreach($project->coders as $coder)
                                <div class="w-25 mx-2">
                                    @if($coder->thumbnail)
                                    <img src="{{ asset('storage/coder/small/'.$coder->thumbnail->name) }}" alt="coder"
                                        width="45px">
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
<!-- End: Our Projects -->
<!-- Start: Partners -->
<div class="partners mb-5 mt-5 pt-5">
    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach($partners as $partner)
            <div class="item">
                <img src="{{ asset('storage/partner/small/'.$partner->thumbnail->name) }}" alt="{{ $partner->name }}">
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End: Partners -->
<x-front.contact-us></x-front.contact-us>

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
