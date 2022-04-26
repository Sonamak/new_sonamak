@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $destination ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences" redirect="{{ route('destination') }}">
            <div class="card-body card-full">

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                        <input type="file" class="dropify" data-default-file="@if($destination->thumbnail) {{ asset('storage/tour/small/'.$destination->thumbnail->name) }} @endif" data-height="200"  name="thumbnail"/>
                    </div>
                    <div class="mx-2 col-md-6">
                        <label for="Tumbnail">Tumbnail</label>
                        <p class="mt-2 sub-text">
                            Enter Beautiful thumbnail to the tour and please add image in aspect ratio to get the best performance
                        </p>
                        <p class="error error_thumbnail"></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Country name</label>
                        <input placeholder="Country name in English" class="form-control w-100" name="country_name_en">
                        <p class="error error_country_name_en"></p>
                        <input placeholder="Country name in French" class="form-control w-100" name="country_name_fr">
                        <p class="error error_country_name_fr"></p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <label>Caption</label>
                        <textarea class="summernote" placeholder="Caption in English" name="caption_in_en"></textarea>
                        <p class="error error_caption_in_en"></p>
                        <textarea class="summernote" placeholder="Caption in French" name="caption_in_fr"></textarea>
                        <p class="error error_caption_in_fr"></p>
                    </div>
                </div>
                

                <input value="@if($destination->id) {{ $destination->id }} @endif" type="hidden" name="id">
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