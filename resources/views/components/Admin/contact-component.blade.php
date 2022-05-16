<div>
    <!-- Be present above all else. - Naval Ravikant -->
</div><form class="ajax-form" action="{{ route('banner.store') }}" method="post">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">Contact Banner</h4>
    </div>
    <div class="form-group col-md-12">
        <label>
            Header Text
        </label>

        <div class="d-flex mb-2">
            <div class="group w-100">
                <input placeholder="Header Text In English" class="form-control" value="@if($banner){{$banner->header_text_in_english}}@endif" name="header_text_in_english">
                <p class="error error_header_text_in_english"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Header Text In French" class="form-control mx-2" value="@if($banner){{$banner->header_text_in_french}}@endif" name="header_text_in_french">
                <p class="error error_header_text_in_french"></p>
            </div>
        </div>

        <Div class="d-flex">
            <div class="group w-100">
                <input placeholder="Text In French" class="form-control" name="upper_text_in_french" value="@if($banner){{$banner->upper_text_in_french}}@endif" name="header_text_in_french">
                <p class="error error_header_text_in_french"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Text In English" class="form-control mx-2" name="upper_text_in_english" value="@if($banner){{$banner->upper_text_in_english}}@endif" name="header_text_in_french">
                <p class="error error_header_text_in_french"></p>
            </div>
        </Div>

        <div class="row mb-4">
            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                <input type="file" class="dropify" data-default-file="@if($banner->background)  {{ asset('storage/banner/large/'.$banner->background->name) }} @endif" data-height="200"  name="background"/>
            </div>
            <div class="mx-2 col-md-6">
                <label for="Tumbnail">Background</label>
                <p class="mt-2 sub-text">
                    Enter Beautiful background to the tour and please add image in aspect ratio to get the best performance
                </p>
                <p class="error error_background"></p>
            </div>
        </div>
        
        <input type="hidden" name="type" value="contact">

        <button class="btn-primary">Submit</button>
    </div>
</form>