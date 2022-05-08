@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $slider->id ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences" redirect="{{ route('slider') }}">
            <div class="card-body card-full">

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                        <input type="file" class="dropify" data-default-file="@if($slider->thumbnail) {{ asset('storage/slider/small/'.$slider->thumbnail->name) }} @endif" data-height="200"  name="thumbnail"/>
                    </div>
                    <div class="mx-2 col-md-6">
                        <label for="Tumbnail">Tumbnail</label>
                        <p class="mt-2 sub-text">
                            Enter Beautiful thumbnail to the destination and please add image in aspect ratio to get the best performance
                        </p>
                        <p class="error error_thumbnail"></p>
                    </div>
                </div>

               <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Title in English</label>
                        <input type="text" placeholder="Title English" class="form-control w-100 my-2 title title_en" name="title_en" value="@if($slider) {{$slider->title_en}} @endif">
                        <p class="error error_title_en"></p>
                    </div>
                    <div class="col-md-6">
                        <label>Title in French</label>
                        <input type="text" placeholder="Title French" class="form-control w-100 my-2 title title_en" name="title_fr" value="@if($slider) {{$slider->title_fr}} @endif">
                        <p class="error error_title_fr"></p>
                    </div>
               </div>

                <div class="mb-4">
                    <label>
                        Text Description In English
                    </label>

                    <textarea class="summernote mb-2" name="description_en">@if($slider) {{ $slider->description_en }} @endif</textarea>
                    <p class="error error_description_en"></p>
                </div>

                <div class="mb-4">
                    <label>
                        Text Description In French
                    </label>
                    
                    <textarea class="summernote mb-2" name="description_fr">@if($slider) {{ $slider->description_fr }} @endif</textarea>
                    <p class="error error_description_fr"></p>
                </div>

                <input value="@if($slider->id) {{ $slider->id }} @endif" type="hidden" name="id">
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

function mergeModelRefrences () {
    
}

</script>

@endsection