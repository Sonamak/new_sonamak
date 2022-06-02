<form class="ajax-form" action="{{ route('banner.store') }}" method="post">
    <div class="card">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">About Page Banner</h4>
    </div>
    <div class="form-group col-md-12">
        <label>
            Header Text
        </label>

        <div class="d-flex mb-2">
            <div class="group w-100">
                <input placeholder="Header Text" class="form-control" value="@if($banner){{$banner->header_text}}@endif" name="header_text">
                <p class="error error_header_text"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Lower Text" class="form-control mx-2" value="@if($banner){{$banner->lower_text}}@endif" name="lower_text">
                <p class="error error_lower_text"></p>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                <input type="file" class="dropify" data-default-file="@if($banner) @if($banner->background) {{ asset('storage/banner/large/'.$banner->background->name) }} @endif @endif" data-height="200"  name="background"/>
            </div>
            <div class="mx-2 col-md-6">
                <label for="Tumbnail">Background</label>
                <p class="mt-2 sub-text">
                    Enter Beautiful background to the tour and please add image in aspect ratio to get the best performance
                </p>
                <p class="error error_background"></p>
            </div>
        </div>
        

        <input type="hidden" name="type" value="about">

        <button class="btn-primary">Submit</button>
    </div>
    </div>
</form>