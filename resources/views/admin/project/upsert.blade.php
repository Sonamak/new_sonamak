@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp
<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $project->id ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences"
            redirect="{{ route('project') }}" swalOnFail="We are human and make mistakes">
            <div class="card-body card-full">

                <div class="row">
                    <div class="col-md-4">
                        <input type="file" class="dropify" data-default-file="@if($project->thumbnail) {{ asset('storage/project/large/'.$project->thumbnail->name) }} @endif" data-height="200" name="thumbnail">
                    </div>
                    <div class="col-md-8">
                        <label>Thumbnail</label>
                        <p>
                            Enter Beautiful thumbnail to the project and please add image in aspect ratio to get the
                            best performance
                        </p>
                        <p class="error error_thumbnail"></p>
                    </div>
                </div>

                <div class="row  mt-2">
                    <div class="col-md-4">
                        <input type="file" class="dropify" data-default-file="@if($project->mockup) {{ asset('storage/project/small/'.$project->mockup->name) }} @endif" data-height="200" name="mockup">
                    </div>
                    <div class="col-md-8">
                        <label>Mockup</label>
                        <p>
                            Enter Beautiful mockup to the project and please add image in aspect ratio to get the best
                            performance
                        </p>
                        <p class="error error_mocukup"></p>
                    </div>
                </div>
               
                <div class="row  mt-2">
                    <div class="col-md-4">
                        <input type="file" class="dropify" data-default-file="@if($project->banner) {{ asset('storage/project/large/'.$project->banner->name) }} @endif" data-height="200" name="banner">
                    </div>
                    <div class="col-md-8">
                        <label>Banner</label>
                        <p>
                            Enter Beautiful banner to the project and please add image in aspect ratio to get the best
                            performance
                        </p>
                        <p class="error error_banner"></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label>Project Title</label>
                        <input type="title" class="form-control" placeholder="Enter Project title" name="title" value="@if($project->title) {{ $project->title }} @endif">
                        <p class="error error_title"></p>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label>Tecnology</label>
                        <input class="form-control" name="tecnology" value=" @if($project->tecnology) {{ $project->tecnology }} @endif ">
                        <p class="error error_tecnology"></p>
                    </div>
                    <div class="col-md-6">
                        <label>Background Color Picker</label>
                        <input type="color" id="head" name="background" value="@if($project->background){{$project->background}}@endif" class="form-control">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label>Country</label>
                        <select name="country" class="form-control form-select select2"
                            data-bs-placeholder="Select Country" readonly>
                            <option value="eg|Egypt"  @if($project->country_iso == 'eg') selected @endif>Egypt</option>
                            <option value="ca|canada" @if($project->country_iso == 'ca') selected @endif>Canada</option>
                            <option value="us|united state" @if($project->country_iso == 'us') selected @endif>United State</option>
                            <option value="sa|saudi arabia" @if($project->country_iso == 'sa') selected @endif>Saudi Arabia</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Service</label>
                        <select name="service_id" class="form-control form-select select2" readonly>
                            @foreach($services as $service)
                            <option value="{{$service->id}}" @if($project->service_id == $service->id) selected @endif>{{$service->name}}</option>
                            @endforeach
                        </select>
                        <p class="error error_service"></p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group mt">
                            <label>Project Keywords</label>
                            <input name="keywords" class="form-control tag" placeholder="Add seo keywords" value="{{ seo_keywords($project) }}">
                            <p class="error error_keywords"></p>
                        </div>
                    </div>
                    <div class="col-md-12 mt-2">
                        <label>Article</label>
                        <textarea class="form-control summernote" placeholder="Enter Article" name="article">@if($project){{$project->article}}@endif</textarea>
                        <p class="error error_article"></p>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label>Style</label>
                        <select name="style" class="form-control form-select select2"
                            data-bs-placeholder="Select Country" readonly>
                            <option value="gallary" @if($project->style == 'gallary') selected @endif>Gallary</option>
                            <option value="one_layer" @if($project->style == 'one_layer') selected @endif>One Layer</option>
                            <option value="feature" @if($project->style == 'feature') selected @endif>Feature</option>
                        </select>
                        <p class="error error_style"></p>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label class="d-block">Coders</label>
                        <select multiple="multiple" class="testselect2 form-control w-100" name="coders[]">
                            @foreach($coders as $coder)
                            <option value="{{$coder->id}}" @if(has_coder($project,$coder->id)) selected @endif>{{$coder->name}}</option>
                            @endforeach
                        </select> 
                        <p class="error error_coders"></p>
                    </div>
                </div>



                <div class="form-group ml-2 mt-3"> 
                    <div class="d-flex">
                        <label for="title">
                            Gallary
                        </label>
                        <i class="fa fa-plus mx-2 mt-1 remove_section gallary_btn" data-insert=".insert_gallary"></i>
                    </div>

                    <input type="file" class="insert_gallary gallary_input d-none" data-container=".gallary_container" data-append=".gallary_files">
                    <input type="file" class="gallary_files d-none" name="gallary[]" multiple>
                    @if( ! count($project->gallary) ) <p class="gallary_empty w-100 text-center">No Image to display here</p> @endif
                    <div class="gallary_container">
                        <div class="row">
                            @if($project->gallary)
                                @foreach($project->gallary as $gallary)
                                <div class="col-md-3 gallary_image">
                                    <div class="image_container d-flex justify-content-center w-100 p-2">
                                        <img src="{{ asset('storage/project/large/'.$gallary->name) }}" alt="badget" model_id="gallary_{{$gallary->id}}" class="gallary_image">
                                        <div class="overlay_image position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                                            <i class="fas fa-times remove_gallary_btn" data-append="gallary_container" model_id="{{ $gallary->id }}" rel="${file.lastModified}"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="removed_gallary"></div>
                    <p class="error error_gallary"></p>
                </div>



                <input value="@if($project->id) {{ $project->id }} @endif" type="hidden" name="id">
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function mergeModelRefrences() {

    }

</script>

@endsection
