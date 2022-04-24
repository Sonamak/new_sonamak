@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $model ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="">
            <div class="card-body card-full">
                
                <div class="form-group">
                    <label for="title">
                        Title
                    </label>
                    <input class="form-control" type="text" placeholder="Title" id="title" name="title">
                    <p class="error error_title"></p>
                </div>

                <div class="form-group">
                    <label for="title">
                        Description English
                    </label>
                    <textarea class="summernote" name="description_en">Hello</textarea>
                    <p class="error error_description_en"></p>
                </div>

                <div class="form-group">
                    <label for="title">
                        Description French
                    </label>
                    <textarea class="summernote" name="description_fr">Hello</textarea>
                    <p class="error error_description_fr"></p>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center mb-2">
                        <label for="title" class="mb-0">
                            Gallary
                        </label>
                        <i class="fa  fa-plus mx-2 gallary_btn" data-insert=".insert_gallary"></i>
                    </div>
                    
                    <div class="gallary_container">
                        <div class="row"></div>
                    </div>

                    <input type="file" class="insert_gallary gallary_input d-none" data-container=".gallary_container" data-append=".gallary_files">
                    <input type="file" class="gallary_files d-none" name="gallary[]" multiple>
                    <p class="gallary_empty w-100 text-center">No Image to display here</p>
                    <p class="error error_gallary"></p>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center mb-2">
                        <label for="title" class="mb-0">
                            Includes
                        </label>
                        <i class="fa  fa-plus mx-2 extra_section" data-container=".insert_includes" method-append="appendInclude"></i>
                    </div>

                    <div class="insert_includes">
                        <p class="gallary_empty w-100 text-center empty_section">No Includes to display here</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-flex align-items-center mb-2">
                        <label for="title" class="mb-0">
                            Excludeds
                        </label>
                        <i class="fa  fa-plus mx-2 extra_section" data-container=".insert_exclude" method-append="appendExclude"></i>
                    </div>

                    <div class="insert_exclude">
                        <p class="gallary_empty w-100 text-center empty_section">No Exclude to display here</p>
                    </div>
                </div>

                <div class="prices">
                    <div class="d-flex align-items-center mb-2">
                        <label for="title" class="mb-0">
                        Tour Itineraries
                        </label>
                        <i class="fa  fa-plus mx-2 extra_section" data-container=".insert_itineraries" method-append="appendItineraries"></i>
                    </div>

                    <div class="insert_itineraries">
                        <p class="gallary_empty w-100 text-center empty_section">No itineraries to display here</p>
                    </div>
                </div>

            </div>


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

    function appendInclude () {
        return `<div class="col-md-6 mb-2 d-flex align-items-center section"><input name="includes[]" class="form-control"><i class="fa fa-minus mx-2 remove_section" data-container=".insert_includes"></i></div>`
    }

    function appendExclude () {
        return `<div class="col-md-6 mb-2 d-flex align-items-center section"><input name="exclude[]" class="form-control"><i class="fa fa-minus mx-2 remove_section" data-container=".insert_exclude"></i></div>`
    }

    function appendItineraries () {
        return `
        <div class="itinerarires_form section">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Itineraries title english" class="form-control w-100 my-2">
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Itineraries title frensh" class="form-control w-100 my-2">
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Day">
                    <i class="fa fa-minus mx-2 remove_section" data-container=".insert_itineraries"></i>
                </div>
            </div>
        </div>
        `
    }

</script>

@endsection