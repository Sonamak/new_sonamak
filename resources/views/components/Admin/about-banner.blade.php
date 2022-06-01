<form class="ajax-form" action="{{ route('info.store') }}" method="post" refreshAfterSend>
    <div class="card">
    <div class="card-header w-100 d-flex">
        <h4 class="card-title mb-1">About Info</h4>
    </div>
    <div class="form-group col-md-12">
        <textarea class="summernote" name="value">{{$info->value}}</textarea>
    </div>
    <div class="form-group col-md-12">
    <div class="d-flex">
        <label for="title">
            Extra About
        </label>
        <i class="fa fa-plus mx-2 mt-1 remove_section extra_section" data-insert=".insert_gallary" data-container=".extra_about_container" method-append="appendExtraAbout"></i>
    </div>
    <div class="removed_section"></div>
    <div class="extra_about_container">
        @foreach($extras as $extra)
        <div class="row section">
            <div class="col-md-12 mb-2 mt-2">
                <input type="text" class="form-control" name="extra[{{$extra->id}}][title]" placeholder="Enter Title" value="{{$extra->title}}">
            </div>
            <div class="col-md-12">
                <textarea type="text" class="form-control" name="extra[{{$extra->id}}][value]" placeholder="Enter Description">{{$extra->value}}</textarea>
            </div>
            <div class="removed_section col-md-12">
                <i class="fa fa-minus mx-2 remove_section mx-3" id="{{$extra->id}}" name="extra_removed[]"></i>
            </div>
        </div>
        <input type="hidden" class="form-control" name="extra[{{$extra->id}}][type]" value="about">
        @endforeach
    </div>
    <input type="hidden" name="type" value="about">
    <div class="removed_section_container"></div>
    <button class="btn-primary">Submit</button>
    </div>
</form>

