<form class="ajax-form" action="{{ route('banner.store') }}" method="post">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">Feature Banner</h4>
    </div>
    <div class="form-group col-md-12">

        <label>
            Header Text
        </label>

        <div class="d-flex mb-2">
            <div class="group w-100">
                <input placeholder="Header Text In English" class="form-control" name="header_text_in_english" value="{{$banner->header_text_in_english}}">
                <p class="error error_header_text_in_english"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Header Text In French" class="form-control mx-2" name="header_text_in_french" value="{{$banner->header_text_in_french}}">
                <p class="error error_header_text_in_french"></p>
            </div>
        </div>

        <label>
            Upper Text
        </label>

        <div class="d-flex mb-2">
            <div class="group w-100">
                <input placeholder="Upper Text In English" class="form-control" name="upper_text_in_english" value="{{$banner->upper_text_in_english}}">
                <p class="error error_upper_text_in_english"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Upper Text In French" class="form-control mx-2" name="upper_text_in_french" value="{{$banner->upper_text_in_french}}">
                <p class="error error_upper_text_in_french"></p>
            </div>
        </div>

        <label>
            Button Text
        </label>

        <div class="d-flex mb-2">
            <div class="group w-100">
                <input placeholder="Button Text English" class="form-control" name="button_text_in_english" value="{{$banner->button_text_in_english}}">
                <p class="error error_button_text_in_english"></p>
            </div>
            <div class="group w-100">
                <input placeholder="Button Text In French" class="form-control mx-2" name="button_text_in_french" value="{{$banner->button_text_in_french}}">
                <p class="error error_button_text_in_french"></p>
            </div>
        </div>

        <label>
            Redirect To
        </label>

        <div class="group">
            <input placeholder="Redirect To" class="form-control mb-2" name="redirect" value="{{$banner->redirect}}">
            <p class="error error_redirect"></p>
        </div>

        <div class="row mb-4">
            <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
            <input type="file" class="dropify" data-default-file="@if($banner->background) {{ asset('storage/banner/large/'.$banner->background->name) }} @endif" data-height="200"  name="background"/>
            </div>
            <div class="mx-2 col-md-6">
                <label for="Tumbnail">Background</label>
                <p class="mt-2 sub-text">
                    Enter Beautiful background to the banner and please add image in aspect ratio to get the best performance
                    (Note: optimum size: 1679x490)
                </p>
                <p class="error error_background"></p>
            </div>
        </div>

        <input type="hidden" name="type" value="feature">

        <button class="btn-primary">Submit</button>
    </div>
</form>