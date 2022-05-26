@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card wide-card w-100 p-4 mt-2">
        <label class="font-weight-bold">Terms and conditions</label>
        <form class="ajax-form" method="post" action="{{ route('info.store') }}" swalOnSuccess="Data saved successfully">
            <div class="">
                <div class="row w-100 h-100">
                    <div class="col-md-12">
                        <textarea class="summernote w-100" name="value">
                            @if($info->where('type','terms_conditions')->count()){{$info->where('type','terms_conditions')->first()->value}}@endif
                        </textarea>
                        <input type="hidden" name="type" value="terms_conditions">
                    </div>
                </div>
                <button class="ajax-btn btn-primary mt-2">Save</button>
            </div>
            <div class="col-md-6">
                <div class="d-flex">
                    <label for="title">
                        Includes
                    </label>
                    <i class="fa fa-plus mx-2 mt-1 remove_section extra_section" data-insert=".insert_gallary" data-container=".include_container" method-append="appendInclude"></i>
                </div>

                <p class="error error_include"></p>

                <div class="include_container mt-2">
                    
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    function appendInclude()
    {
        let index = $('.include_container').children().length;

        return `<input class="include" name="include['value'][${index}]">`
    }
</script>
@endsection