<form class="ajax-form" action="{{ route('banner.store') }}" method="post">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">Destination Video</h4>
    </div>
    <div class="form-group col-md-12">
        <label>
        Youtube Embedded
        </label>

        <Div class="d-flex">
            <div class="group w-100">
                <input placeholder="Added Youtube Embedded" class="form-control mx-2" name="upper_text_in_english" value="@if($banner){{$banner->upper_text_in_english}}@endif">
            </div>
        </Div>
        <input type="hidden" name="type" value="video">
        <input type="hidden" value="video" name="header_text_in_english">
        <input type="hidden" value="video" name="header_text_in_french">
        <button class="btn-primary mt-2">Submit</button>
    </div>
</form>