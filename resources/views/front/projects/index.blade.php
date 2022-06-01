@extends('front.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('front/css/pages/projects.css') }}"  rel="stylesheet" />
<link rel="preload" href="{{ asset('front/css/pages/projectsdefer.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ asset('front/css/pages/projectdefer.css') }}"></noscript>
@endsection

@section('title')
Projects
@endsection

@section('content')
<section id="page-content">
    <div class="container">
        <!-- Portfolio Filter -->
        <nav class="grid-filter gf-outline" data-layout="#portfolio">
            <ul>
                <li><a href="#" data-category="*">Show All</a></li>
                @foreach($services as $service)
                <li><a href="#" data-category=".ct-{{$service->strip_name}}" >{{$service->name}}</a></li>
                @endforeach
            </ul>
            <div class="grid-active-title">Show All</div>
        </nav>
        <!-- end: Portfolio Filter -->
        <!-- Portfolio -->
        <div id="portfolio" class="grid-layout portfolio-4-columns " data-margin="0" da>
            <!-- portfolio item -->
            @foreach($projects as $project)
            @if($project->style == 'Gallary')
            <div class="portfolio-item no-overlay ct-{{$project->service_name}} intersector ghost">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-slider">
                        <div class="carousel dots-inside dots-dark arrows-dark" data-items="1" data-loop="true"
                            data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut"
                            data-autoplay="1500">
                            @foreach($project->gallary as $gallary)
                            <a href="{{ route('project.show',['project'=> $project->id]) }}" alt="gallary">
                                <img src="{{ asset('storage/project/small/'.$gallary->name) }}" alt="gallary" width="278" height="219">
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @elseif($project->style == 'Feature')
            <div class="portfolio-item large-width  img-zoom ct-{{$project->service_name}} intersector ghost">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="{{ route('project.show',['project' => $project->id]) }}">
                            <img data="{{ asset('storage/project/large/'.$project->thumbnail->name) }}" alt="" width="557" height="417">
                        </a>
                    </div>
                    <div class="portfolio-description">
                        <a href="{{ route('project.show',['project' => $project->id]) }}">
                            <h3>{{ $project->title }}</h3>
                            <span>{{ $project->service->name }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="portfolio-item img-zoom ct-{{$project->service_name}} intersector ghost">
                <div class="portfolio-item-wrap">
                    <div class="portfolio-image">
                        <a href="{{ route('project.show',['project'=>$project->id]) }}">
                            <img src="{{ asset('storage/project/large/'.$project->thumbnail->name) }}" alt="" width="278" height="219">
                        </a>
                    </div>
                    <div class="portfolio-description d-flex justify-content-center">
                        @if(! count($project->gallary))
                        <a title="{{ ucfirst($project->title) }}" data-lightbox="image" href="{{ asset('storage/project/large/'.$project->thumbnail->name) }}">
                            <i class="fa-solid fa-display"></i>
                        </a>
                        <a href="{{ route('project.show',['project'=>$project->id]) }}">
                            <i class="fa-solid fa-link"></i>
                        </a>
                        @else
                        <div class="portfolio-description d-flex justify-content-center" data-lightbox="gallery">
                            <a href="{{ route('project.show',['project'=>$project->id]) }}">
                                <i class="fa-solid fa-link"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                   
                    
                </div>
            </div>
            @endif
            
            @endforeach
</section>
@endsection
