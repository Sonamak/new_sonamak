@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card-full">
        <x-admin.about-banner></x-admin.about-banner>
    </div>
</div>
<script>
   function appendExtraAbout()
    {
    let index = $('.include_container').children().length;

    return `
        <div class="row section">
            <div class="col-md-12 mb-2 mt-2">
                <input type="text" class="form-control" name="extra[index][title]" placeholder="Enter Title">
            </div>
            <div class="col-md-12">
                <textarea type="text" class="form-control" name="extra[index][value]" placeholder="Enter Description"></textarea>
            </div>
            <div class="removed_section col-md-12">
                <i class="fa fa-minus mx-2 remove_section mx-3"></i>
            </div>
        </div>
        <input type="hidden" class="form-control" name="extra[index][type]" value="about">
    `
    }
</script>
@endsection