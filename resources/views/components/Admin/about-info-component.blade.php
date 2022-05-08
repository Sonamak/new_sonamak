<div class="about_info mb-3">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">About Us</h4>
    </div>
    <form class="ajax-form container-fluid" action="{{ route('info.store') }}" method="post">
        <div class="form-group">
            <label>
                About Us English
            </label>
            <textarea class="summernote form-control" name="value_en">@if($info) {{$info->value_en}} @endif</textarea>
        </div>
        <div class="form-group">
            <label>
                About Us French
            </label>
            <textarea class="summernote form-control" name="value_fr">@if($info) {{$info->value_fr}} @endif</textarea>
        </div>
        <input type="hidden" name="type" value="about">
        <button class="btn btn-primary">Submit Form</button>
    </form>
</div>