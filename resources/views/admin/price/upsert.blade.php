@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $price->id ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" redirect="{{ route('price') }}" swalOnfail="Some errors occure review your form for more information">
            <div class="card-body card-full">

                <div class="form-group">
                    <label>
                        Price Name English
                    </label>
                    <input class="form-control" placeholder="Enter Price Name English" name="name_en" value="@if($price){{$price->name_en}}@endif">
                    <p class="error error_name_en m-0"></p>
                </div>

                <div class="form-group">
                    <label>
                        Price Name French
                    </label>
                    <input class="form-control" placeholder="Enter Price Name French" name="name_fr" value="@if($price){{$price->name_fr}}@endif">
                    <p class="error error_name_fr m-0"></p>
                </div>

                <div class="form-group">
                    <label>
                        Price Desciption Lower Season In English
                    </label>
                    <textarea class="form-control" name="description_lower_season_en">@if($price->description_lower_season_en){{$price->description_lower_season_en}}@endif</textarea>
                    <p class="error error_description_lower_season_en m-0"></p>
                </div>

                <div class="form-group">
                    <label>
                        Price Desciption Lower Season In French
                    </label>
                    <textarea class="form-control" name="description_lower_season_fr">@if($price->description_lower_season_fr){{$price->description_lower_season_fr}}@endif</textarea>
                    <p class="error error_description_lower_season_fr m-0"></p>
                </div>

                <div class="form-group">
                    <label>
                        Price Desciption Upper Season In English
                    </label>
                    <textarea class="form-control" name="description_peak_season_en">@if($price->description_peak_season_en){{$price->description_peak_season_en}}@endif</textarea>
                    <p class="error error_description_peak_season_en m-0"></p>
                </div>

                <div class="form-group">
                    <label>
                        Price Desciption Upper Season In French
                    </label>
                    <textarea class="form-control" name="description_peak_season_fr">@if($price->description_peak_season_fr){{$price->description_peak_season_fr}}@endif</textarea>
                    <p class="error error_description_peak_season_fr m-0"></p>
                </div>

                <div class="row px-2">
                    <div class="form-group col-md-6 px-0">
                        <label>
                            Tour
                        </label>
                        <select class="select2" name="tour_id">
                            @if(! $price->tour_id)
                            <option>-- Select Tour --</option>
                            @endif
                            @foreach($tours as $tour)
                                <option @if($price) @if($price->tour_id == $tour->id) selected @endif @endif value="{{$tour->id}}">{{$tour->title_en}}</option>
                            @endforeach

                        </select>
                        <p class="error error_tour_id m-0"></p>
                    </div>

                    <div class="form-group col-md-6 px-0 ps-2">
                        <label>
                            Price Type
                        </label>
                        <select class="select2" name="price_type">
                            <option value="regular" @if($price) @if($price->price_type == 'regular') selected @endif @endif>
                            Regular
                            </option>
                            <option value="luxory" @if($price) @if($price->price_type == 'luxory') selected @endif @endif>
                            Luxory
                            </option>
                            <option value="ultra" @if($price) @if($price->price_type == 'ultra') selected @endif @endif>
                            Ultra
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row px-2">
                    <div class="col-md-6 px-0">
                        <label>
                            Caption English
                        </label>
                        <input type="text" name="caption_en" class="form-control" value="@if($price) {{$price->caption_en}} @endif">
                    </div>
                    <div class="col-md-6 ps-2">
                        <label>
                            Caption
                        </label>
                        <input type="text" name="caption_fr" class="form-control" value="@if($price) {{$price->caption_fr}} @endif">
                    </div>
                </div>

               <div class="form-group">
                   
                    <div class="d-flex mt-2">
                        <label>
                            Packeges Details
                        </label>
                        <i class="fa fa-plus mx-2 mt-1 remove_section extra_section"  data-container=".packages_container" method-append="appendPackages"></i>
                    </div>
                    <p class="error error_package"></p>

                    <div class="packages_container">
                        @foreach($price->packages as $package)
                        <div class="row section">

                            <div class="col-md-6">
                                <select class="form-control me-2" name="package[{{$loop->index}}][season]">
                                    <option @if($package->season == 'Lower Season') selected @endif>
                                        Lower Season
                                    </option>
                                    <option @if($package->season == 'Peak Season') selected @endif>
                                        Peak Season
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select class="form-control me-2" name="package[{{$loop->index}}][room_type]">
                                    <option @if($package->room_type == 'Single Room') selected @endif>
                                        Single Room
                                    </option>
                                    <option @if($package->room_type == 'Double Room') selected @endif>
                                        Double Room
                                    </option>
                                    <option @if($package->room_type == 'Trible Room') selected @endif>
                                        Trible Room
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-4 mt-2">
                                <input class="form-control" placeholder="USD Price" value="{{$package->usd_price}}" name="package[{{$loop->index}}][usd_price]">
                            </div>
                            <div class="col-md-4 mt-2">
                                <input class="form-control" placeholder="EUR Price" value="{{$package->eur_price}}" name="package[{{$loop->index}}][eur_price]">
                            </div>
                            <div class="col-md-4 mt-2">
                                <input class="form-control" placeholder="CAD Price" value="{{$package->cad_price}}" name="package[{{$loop->index}}][cad_price]">
                            </div>
                            <div class="col-md-12">
                                <i class="fa fa-minus ms-auto remove_section" data-container=".packages_container" name="removed_package[]" id="{{  $package->id }}"></i>
                            </div>
                            <input type="hidden" name="package[{{$loop->index}}][id]" value="{{$package->id}}">
                            </div>
                            <p class="error error_package_${index}"></p>
                        @endforeach
                        <p class="empty_section w-100 text-center @if(!$price->package) d-none @endif"> No prices Avaliable to Display </p>
                    </div>

                    <div class="removed_section_container"></div>


               </div>
                
                <p class="error error_body"></p>

                <input value="@if($price->id) {{ $price->id }} @endif" type="hidden" name="id">
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

function appendPackages () {
    let index  = $('.packages_container').children().length;
    return `
        <div class="row section">

            <div class="col-md-6">
                <select class="form-control me-2" name="package[${index}][season]">
                    <option>
                        Lower Season
                    </option>
                    <option>
                        Peak Season
                    </option>
                </select>
            </div>

            <div class="col-md-6">
                <select class="form-control me-2" name="package[${index}][room_type]">
                    <option>
                        Single Room
                    </option>
                    <option>
                        Double Room
                    </option>
                    <option>
                        Trible Room
                    </option>
                </select>
            </div>

            <div class="col-md-4 mt-2">
                <input class="form-control" placeholder="USD Price" name="package[${index}][usd_price]">
            </div>
            <div class="col-md-4 mt-2">
                <input class="form-control" placeholder="EUR Price" name="package[${index}][eur_price]">
            </div>
            <div class="col-md-4 mt-2">
                <input class="form-control" placeholder="CAD Price" name="package[${index}][cad_price]">
            </div>

            <input type="hidden" name="package[${index}][id]">
            <div class="col-md-12">
                <i class="fa fa-minus ms-auto remove_section" data-container=".packages_container" name="removed_package[]" id=""></i>
            </div>
        </div>
        <p class="error error_package_${index}"></p>
    `
}

</script>

@endsection