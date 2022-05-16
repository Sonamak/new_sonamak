@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $blog ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences" redirect="{{ route('blog') }}">
        <div class="card-body card-full">

        <div class="row mb-4">
            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                <input type="file" class="dropify" data-default-file="@if($blog->thumbnail) {{ asset('storage/blog/small/'.$blog->thumbnail->name) }} @endif" data-height="200"  name="thumbnail"/>
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
                <label>Title English</label>
                <input class="form-control"  name="title_en" value="{{$blog->title_en}}">
                <p class="error error_title_en"></p>
                <label>Title French</label>
                <input class="form-control" name="title_fr" value="{{$blog->title_fr}}">
                <p class="error error_title_fr"></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-12">
                <label>Article English</label>
                <textarea class="summernote"  name="article_in_en">{{$blog->article_in_en}}</textarea>
                <p class="error error_article_in_en"></p>
                <label>Article French</label>
                <textarea class="summernote" name="article_in_fr">{{$blog->article_in_fr}}</textarea>
                <p class="error error_article_in_fr"></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6">
                <label>Category</label>
                <select class="select2" name="category_id">
                    <option class="d-none" @if(!$blog->category_id) selected @endif value="Null">No Category</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($blog->category_id == $category->id) selected {{$category->name}}  @endif>
                        {{$category->name_en}}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6 p-0">
            <label class="form-label">Blog Language</label>
            <select name="language" class="select2">
                <option value="mixed" @if($blog->language == 'mixed') selected @endif @if(!$blog) selected @endif>Mixed</option>
                <option value="english"  @if($blog->language == 'english') selected @endif>English</option>
                <option value="french"  @if($blog->language == 'french') selected @endif>French</option>
            </select>
            <p class="error error_language"></p>
        </div>
        


        <input value="@if($blog->id) {{ $blog->id }} @endif" type="hidden" name="id">
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