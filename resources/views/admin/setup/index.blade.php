@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <form class="ajax-form p-3" action="{{ route('setup.store') }}" method="post" refreshAfterSend>
            <div class="form-group">
                <label>Website Seo Title</label>
                <input class="form-control" placeholder="Website Title" name="website_title" value="{{app()->make('setup',['type' => 'website title'])[0]}}">
                <p class="error error_website_title"></p>
            </div>
            <div class="form-group">
                <label>Website Seo Description</label>
                <textarea class="form-control" placeholder="Website Description" name="website_description" value="">{{app()->make('setup',['type' => 'website description'])[0]}}</textarea>
                <p class="error error_website_description"></p>
            </div>
            <div class="form-group">
                <label>Website Footer Description</label>
                <textarea class="form-control" placeholder="Website Footer Description" name="website_footer_description_en">{{app()->make('setup',['type' => 'website footer description english'])[0]}}</textarea>
                <p class="error error_website_footer_description_en"></p>
            </div>
            <div class="form-group">
                <label>Website Default Seo</label>
                <input name="seo_keyword" class="form-control tag" placeholder="Add seo keywords" value="{{ seo_default_keywords() }}">
            </div>
            <div class="header_logo mb-3 row">
                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                    <input type="file" class="dropify" data-default-file="{{ asset('storage/system/small/'.app()->make('setup',['type' => 'header logo'])[0]) }}" data-height="200"  name="header_logo"/>
                </div>
                <div class="mx-2 col-md-6">
                    <label for="Tumbnail">Header Logo</label>
                    <p class="mt-2 sub-text">
                        Enter Beautiful thumbnail to the website and please add image in aspect ratio to get the best performance
                    </p>
                    <p class="error error_header_logo"></p>
                </div>
            </div>
            <div class="footer_logo mb-3 row">
                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                    <input type="file" class="dropify" data-default-file="{{ asset('storage/system/small/'.app()->make('setup',['type' => 'website footer logo'])[0]) }}" data-height="200"  name="footer_logo"/>
                </div>
                <div class="mx-2 col-md-6">
                    <label for="Tumbnail">Footer Logo</label>
                    <p class="mt-2 sub-text">
                        Enter Beautiful thumbnail to the destination and please add image in aspect ratio to get the best performance
                    </p>
                    <p class="error error_footer_logo"></p>
                </div>
            </div>
            <div class="short_logo mb-3 row">
                <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                    <input type="file" class="dropify" data-default-file="{{ asset('storage/system/small/'.app()->make('setup',['type' => 'short logo'])[0]) }}" data-height="200"  name="short_logo"/>
                </div>
                <div class="mx-2 col-md-6">
                    <label for="Tumbnail">Short Logo</label>
                    <p class="mt-2 sub-text">
                        Enter Beautiful thumbnail to the destination and please add image in aspect ratio to get the best performance
                    </p>
                    <p class="error error_short_logo"></p>
                </div>
            </div>
            <button class="ajax-btn btn-primary">Save Settings</button>
        </form>
    </div>

</div>
@endsection