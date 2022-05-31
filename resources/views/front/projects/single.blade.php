@extends('front.layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('front/css/pages/projects.css') }}"  rel="stylesheet" />
<link rel="preload" href="{{ asset('front/css/pages/projectsdefer.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.2.0/css/flag-icons.min.css" integrity="sha512-uvXdJud8WaOlQFjlz9B15Yy2Au/bMAvz79F7Xa6OakCl2jvQPdHD0hb3dEqZRdSwG4/sknePXlE7GiarwA/9Wg==" crossorigin="anonymous" referrerpolicy="no-referrer">
@endsection

@section('title')
{{$project->title}}
@endsection

@section('content')
<div id="page-content pt-0">
    <header class="banner w-100 d-flex justify-content-end flex-column align-items-center py-5" style="background-image: linear-gradient(#0004,#0004), url('@if($project->banner){{ asset('storage/project/large/'.$project->banner->name) }}@else{{ asset('storage/system/placeholders/banner.png') }}@endif')">
       <div class="container">
            <h1 class="w-100 text-start">{{ ucfirst($project->title) }}</h1>
            <ul class="nav">
                <li class="item_holder px-2 d-flex justify-content-center align-items-center clickable"><i class="fa-solid fa-earth-africa fa pe-2 mx-2"></i><span class="item">{{ $project->service->name }}</span></li>
                <li class="item_holder px-2 d-flex justify-content-center align-items-center px-2"><i class="fa-solid fa-gears fa pe-2 mx-2"></i><span class="item">{{ $project->tecnology }}</span></li>
                <li class="item_holder px-2 d-flex justify-content-center align-items-center px-2"><i class="fi fi-{{$project->country_iso}} mx-2"></i><span class="item">{{ ucfirst($project->country) }}</span></li>
            </ul>
            <ul class="nav mt-3">
                @foreach($project->coders as $coder)
                <li class="item p-2">
                    <img src="@if($coder->thumbnail){{ asset('storage/coder/small/'.$coder->thumbnail->name) }}@endif" width="30" height="54">
                </li>
                @endforeach
            </ul>
       </div>
    </header>
</div>
<div class="container article">
    {!! $project->article !!}
</div>
@endsection
