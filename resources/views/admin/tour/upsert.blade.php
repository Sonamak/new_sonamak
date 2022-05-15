@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $tour ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <!-- appendToData="mergeTourRefrences" -->
        <form class="ajax-form" method="post" action="{{ route($route) }}"  redirect="{{ route('tour') }}">
            <div class="card-body card-full">

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                        <input type="file" class="dropify" data-default-file="@if($tour->thumbnail) {{ asset('storage/tour/small/'.$tour->thumbnail->name) }} @endif" data-height="200"  name="thumbnail"/>
                    </div>
                    <div class="mx-2 col-md-6">
                        <label for="Tumbnail">Tumbnail</label>
                        <p class="mt-2 sub-text">
                            Enter Beautiful thumbnail to the tour and please add image in aspect ratio to get the best performance
                        </p>
                        <p class="error error_thumbnail"></p>
                    </div>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                            <input type="file" class="dropify" data-default-file="@if($tour->location) {{ asset('storage/tour/small/'.$tour->location->name) }} @endif" data-height="200"  name="location"/>
                        </div>
                        <div class="mx-2 col-md-6">
                            <label for="Location">Location</label>
                            <p class="mt-2 sub-text">
                                Enter Location of the tour and please add image in aspect ratio to get the best performance
                            </p>
                            <p class="error error_location"></p>
                        </div>
                    </div>

                </div>
                
                <div class="form-group">
                    <label for="title">
                        Title
                    </label>
                    <input class="form-control" type="text" placeholder="Title" id="title" name="title_en" value="@if($tour->title_en) {{ $tour->title_en }} @endif">
                    <p class="error error_title_en"></p>
                    <input class="form-control mt-2" type="text" placeholder="Title" id="title" name="title_fr" value="@if($tour->title_fr) {{ $tour->title_fr }} @endif">
                    <p class="error error_title_fr"></p>
                </div>

                <div class="form-group">
                    <label for="title">
                        Description English
                    </label>
                    <textarea class="summernote" name="description_en">@if($tour->description_en) {{ $tour->description_en }} @endif</textarea>
                    <p class="error error_description_en"></p>
                </div>

                <div class="form-group">
                    <label for="title">
                        Description French
                    </label>
                    <textarea class="summernote" name="description_fr">@if($tour->description_en) {{ $tour->description_fr }} @endif</textarea>
                    <p class="error error_description_fr"></p>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-md-6">
                                <label for="country">
                                    Country Text English
                                </label>
                                <input class="country_text_en form-control" name="country_text_in_en" value="@if($tour->country_text_in_en) {{ $tour->country_text_in_en }} @endif" placeholder="Country Text English">
                                <p class="error error_country_text_en"></p>
                        </div>
                       <div class="col-md-6">
                            <div class="row">
                                <label for="country">
                                    Country Text French
                                </label>
                            </div>

                            <input class="country_text_en form-control" name="country_text_in_fr" value="@if($tour->country_text_in_en) {{ $tour->country_text_in_fr }} @endif" placeholder="Country Text English">
                            <p class="error error_country_text_en"></p>
                       </div>
                    </div>

                </div>

                <div class="form-group">

                <div class="row">
                    <div class="col-md-6">
                        <label for="country">
                            Duration Text English
                        </label>
                        <input class="duration_text_en form-control" name="duration_text_in_en" value="@if($tour->duration_text_in_en) {{ $tour->duration_text_in_en }} @endif" placeholder="Duration Text English">
                        <p class="error error_country_text_english"></p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <label for="country">
                                Duration Text French
                            </label>
                        </div>

                        <input class="duration_text_french form-control" name="duration_text_in_fr" value="@if($tour->duration_text_in_fr) {{ $tour->duration_text_in_fr }} @endif" placeholder="Duration Text English">
                        <p class="error error_duration_text_french"></p>
                    </div>
                </div>

               

                </div>

             

                <div class="form-group">
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex">
                                <label for="title">
                                    Includes
                                </label>
                                <i class="fa fa-plus mx-2 mt-1 remove_section extra_section" data-insert=".insert_gallary" data-container=".include_container" method-append="appendInclude"></i>
                            </div>
                            <div class="include_container mt-2">
                                @if($tour->tourPrefrences)
                                    @foreach($tour->includes as $include)

                                    <div class="row section">
                                        <div class="col-md-6 mb-2 d-flex align-items-center">
                                            <input type="text" class="form-control" value="{{$include->value_en}}"  name="include[{{$loop->index}}][value_en]" placeholder="Include English">
                                        </div>
                                        <div class="col-md-6 mb-2 d-flex align-items-center">
                                            <input type="text" class="form-control" value="{{$include->value_en}}" name="include[{{$loop->index}}][value_fr]" placeholder="Include French"> 
                                        </div>
                                        <input type="hidden" name="include[{{$loop->index}}][type]" value="include">
                                        <input type="hidden" name="include[{{$loop->index}}][id]" value="{{$include->id}}">
                                        <i class="fa fa-minus mx-2 remove_section mx-3" name="removed_include[]" id="{{$include->id}}" data-container=".include_container"></i>
                                    </div>
                                    <p class="error error_include_{{$loop->index}} col-md-6"></p>
                                    
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="d-flex">
                                <label for="title">
                                    Excludes
                                </label>
                                <i class="fa fa-plus mx-2 mt-1 remove_section extra_section" data-insert=".insert_gallary" data-container=".exclude_container" method-append="appendExclude"></i>
                            </div>
                            <div class="align-items-center w-100">
                                <div class="exclude_container mt-2">
                                    @if($tour->tourPrefrences)
                                        @foreach($tour->excludes as $exclude)
                                    
                                            <div class="row section">
                                                <div class="col-md-6 mb-2 d-flex align-items-center">
                                                    <input type="text" class="form-control" value="{{$exclude->value_en}}"  name="exclude[{{$loop->index}}][value_en]" placeholder="Exclude English">
                                                </div>
                                                <div class="col-md-6 mb-2 d-flex align-items-center">
                                                    <input type="text" class="form-control" value="{{$exclude->value_en}}" name="exclude[{{$loop->index}}][value_fr]" placeholder="Exclude French"> 
                                                </div>
                                                <input type="hidden" name="exclude[{{$loop->index}}][type]" value="exclude">
                                                <input type="hidden" name="exclude[{{$loop->index}}][id]" value="{{$exclude->id}}">
                                                <i class="fa fa-minus mx-2 remove_section mx-3" name="removed_exclude[]" id="{{$exclude->id}}" data-container=".exclude_container"></i>
                                            </div>
                                            <p class="error error_exclude_{{$loop->index}} col-md-6"></p>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add_container"></div>
                <div class="remove_section"></div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Tour Destination</label>
                            <select class="select2" name="destination_id">
                                <option class="d-none"selected value="Null">Extra </option>
                                @foreach($destinations as $destination)
                                <option value="{{$destination->id}}">
                                    {{$destination->country_name_en}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Tour Category</label>
                            <select class="select2" name="category_id">
                                <option class="d-none"  value="Null">No Category </option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($tour->category_id) @if($tour->category_id == $category->id) selected @endif @endif>
                                    {{$category->name_en}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    
                    <label>
                        Itinerary Description In English
                    </label>

                    <textarea class="summernote mb-2" name="itinerary_description_en">@if($tour->itinerary_description_fr) {{ $tour->itinerary_description_en }} @endif</textarea>

                    <label class="mt-2">
                        Itinerary Description In French
                    </label>

                    <textarea class="summernote mb-2" name="itinerary_description_fr">@if($tour->itinerary_description_fr) {{ $tour->itinerary_description_fr }} @endif</textarea>



                    <div class="d-flex mt-2">
                        <label>
                            Itinerary Details
                        </label>
                        <i class="fa fa-plus mx-2 mt-1 remove_section extra_section" data-insert=".insert_gallary" data-container=".itinerary_container" method-append="appendItinerary"></i>
                    </div>

                    <div class="itinerary_container">
                        @foreach($tour->itinerarie as $itinerary) 
                        <div class="itinerarires_form section">
                            <input type="hidden" class="form-control w-100 my-2 title title_fr" name="itinerary[{{$loop->index}}][id]"  value="{{ $itinerary->id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Itineraries title english" class="form-control w-100 my-2 title title_en" name="itinerary[{{$loop->index}}][title_en]" value="{{ $itinerary->title_en }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="Itineraries title frensh" class="form-control w-100 my-2 title title_fr" name="itinerary[{{$loop->index}}][title_fr]"  value="{{ $itinerary->title_fr }}">
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control description description_en my-2" placeholder="English Description" name="itinerary[{{$loop->index}}][description_en]"  value="">{{ $itinerary->description_en }}</textarea>
                                    <textarea class="form-control description description_fr my-2" placeholder="French Description" name="itinerary[{{$loop->index}}][description_fr]"   value="">{{ $itinerary->description_fr }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" placeholder="Day" name="itinerary[{{$loop->index}}][day]" value="{{$itinerary->day}}">
                                    <i class="fa fa-minus mx-2 remove_section" data-container=".itinerary_container" name="removed_itinerary[]" id="{{$itinerary->id}}"></i>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="form-group">
                    
                </div>
                

                <div class="form-group"> 
                    <div class="d-flex">
                        <label for="title">
                            Gallary
                        </label>
                        <i class="fa fa-plus mx-2 mt-1 remove_section gallary_btn" data-insert=".insert_gallary"></i>
                    </div>
                    <input type="file" class="insert_gallary gallary_input d-none" data-container=".gallary_container" data-append=".gallary_files">
                    <input type="file" class="gallary_files d-none" name="gallary[]" multiple>
                    @if( ! $tour->gallary->count()) <p class="gallary_empty w-100 text-center">No Image to display here</p> @endif
                    <div class="gallary_container">
                        <div class="row">
                            @if($tour->gallary)
                                
                                @foreach($tour->gallary as $gallary)
                                <div class="col-md-3 gallary_image">
                                    <div class="image_container d-flex justify-content-center w-100 p-2">
                                        <img src="{{ asset('storage/tour/small/'.$gallary->name) }}" alt="badget" model_id="gallary_{{$gallary->id}}" class="gallary_image">
                                        <div class="overlay_image position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                                            <i class="fas fa-times remove_gallary_btn" data-append="gallary_container" model_id="{{ $gallary->id }}" rel="${file.lastModified}"></i>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            @endif
                        </div>
                    </div>
                    <div class="removed_gallary"></div>
                    <p class="error error_gallary"></p>
                </div>

                <div class="removed_section_container"></div>

                

                <input value="@if($tour->id) {{ $tour->id }} @endif" type="hidden" name="id">
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

    function appendInclude (include) {
        let index = $('.include_container').children().length;
        return `
           <div class="row section">
                <div class="col-md-6 mb-2 d-flex align-items-center section">
                    <input type="text" class="form-control"  name="include[${index}][value_en]" placeholder="Include English"> 
                </div>
                <div class="col-md-6 mb-2 d-flex align-items-center section">
                    <input type="text" class="form-control"  name="include[${index}][value_fr]" placeholder="Include French"> 
                </div>
                <input type="hidden" name="include[${index}][type]" value="include">
                <input type="hidden" name="include[${index}][id]" value="">
                <i class="fa fa-minus mx-2 remove_section mx-3" name="removed_exclude[]"  data-container=".exclude_container"></i>
           </div>
           <p class="error error_include_${index} col-md-6"></p>
        `
    }


    function appendExclude (include) {
        let index = $('.exclude_container').children().length;
        return `
           <div class="row section">
                <div class="col-md-6 mb-2 d-flex align-items-center section">
                    <input type="text" class="form-control"  name="exclude[${index}][value_en]" placeholder="exclude English"> 
                </div>
                <div class="col-md-6 mb-2 d-flex align-items-center section">
                    <input type="text" class="form-control"  name="exclude[${index}][value_fr]" placeholder="exclude French"> 
                </div>
                <input type="hidden" name="exclude[${index}][type]" value="exclude">
                <input type="hidden" name="exclude[${index}][id]" value="">
                <i class="fa fa-minus mx-2 remove_section mx-3" name="removed_exclude[]"  data-container=".exclude_container"></i>
           </div>
           <p class="error error_exclude_${index} col-md-6"></p>
        `
    }

    function storeIncludeInput (e) {

        return `
            <input type="hidden" name="include[value]" class="d-none" value="${e}">
            <input type="hidden" name="include[type]" class="d-none" value="${e}">
        `;
    }

    // function appendExclude (exclude) {
    //     return `<div class="col-md-6 mb-2 d-flex align-items-center section">
    //                 <p class="m-0">${exclude}</p>
    //                 <i class="fa fa-minus mx-2 remove_section ms-auto remove_section" data-container=".insert_exclude" name="removed_exclude[]"></i>
    //                 <input type="hidden" value="${exclude}" name="exclude[]"> 
    //             </div>`
    // }

    function storeExcludeInput (e) {
        return `<input type="hidden" name="exlude[]" class="d-none" value="${e}">`;
    }

    function appendItinerary () {
        let index = $('.itinerary_container').children().length;
        return `
        <div class="itinerarires_form section">
            <input type="hidden" class="form-control" placeholder="Day" name="itinerary[${index}][id]">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" placeholder="Itineraries title english" class="form-control w-100 my-2 title title_en" name="itinerary[${index}][title_en]">
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Itineraries title frensh" class="form-control w-100 my-2 title title_fr" name="itinerary[${index}][title_fr]">
                </div>
                <div class="col-md-12">
                    <textarea class="form-control description description_en my-2" placeholder="English Description" name="itinerary[${index}][description_en]"></textarea>
                    <textarea class="form-control description description_fr my-2" placeholder="French Description" name="itinerary[${index}][description_fr]"></textarea>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Day" name="itinerary[${index}][day]">
                    <i class="fa fa-minus mx-2 remove_section" data-container=".itinerary_container"></i>
                </div>
            </div>
        </div>
        `
    }

    function mergeTourRefrences () {

        let refrences = [];
        let itinerarires = [];

        $('.itinerarires_form').each( function() {

            let itinerariry = {};

            $(this).find('input,textarea').each(function(){
                if( $(this).hasClass('title') )  {

                    name = $(this).hasClass('title_en') ? 'title_en' : 'title_fr';

                    itinerariry[name]= $(this).val();

                } else if($(this).hasClass('description')) {

                    name = $(this).hasClass('description_en') ? 'description_en' : 'description_fr';

                    itinerariry[name] = $(this).val();

                } else {
                    itinerariry.day = $(this).val();
                }
            });

            itinerarires.push(itinerariry);
            itinerariry = {};

        });

        refrences['itinerarires'] = itinerarires;

        return refrences;

    }

</script>

@endsection