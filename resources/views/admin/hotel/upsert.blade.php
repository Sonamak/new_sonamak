@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $hotel->id ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences" redirect="{{ route('hotel') }}">
            <div class="card-body card-full">

                <div class="row mb-4">
                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                        <input type="file" class="dropify" data-default-file="@if($hotel->thumbnail) {{ asset('storage/hotel/small/'.$hotel->thumbnail->name) }} @endif" data-height="200"  name="thumbnail"/>
                    </div>
                    <div class="mx-2 col-md-6">
                        <label for="Tumbnail">Tumbnail</label>
                        <p class="mt-2 sub-text">
                            Enter Beautiful thumbnail to the destination and please add image in aspect ratio to get the best performance
                        </p>
                        <p class="error error_thumbnail"></p>
                    </div>
                </div>

               <div class="row mb-4">
                    <div class="col-md-6">
                        <label>Title in English</label>
                        <input type="text" placeholder="Title English" class="form-control w-100 my-2 title title_en" name="title_en" value="@if($hotel) {{$hotel->title_en}} @endif">
                        <p class="error error_title_en"></p>
                    </div>
                    <div class="col-md-6">
                        <label>Title in French</label>
                        <input type="text" placeholder="Title French" class="form-control w-100 my-2 title title_en" name="title_fr" value="@if($hotel) {{$hotel->title_fr}} @endif">
                        <p class="error error_title_fr"></p>
                    </div>
               </div>

               <div class="row mb-4">
                    <div class="col-md-12">
                        <label>
                            Price Quote
                        </label>
                        <select class="select2" name="price_id">
                            @foreach($prices as $price)
                                <option value="{{$price->id}}">{{ $price->name_en }}</option>
                            @endforeach
                        </select>
                        <p class="error error_price_id"></p>
                    </div>
               </div>

                <div class="mb-4">
                    <label>
                        Hotel Description In English
                    </label>

                    <textarea class="mb-2  form-control" name="description_en">@if($hotel) {{ $hotel->description_en }} @endif</textarea>
                    <p class="error error_description_en"></p>
                </div>

                <div class="mb-4">
                    <label>
                        Hotel Description In French
                    </label>
                    
                    <textarea class="mb-2 form-control" name="description_fr">@if($hotel) {{ $hotel->description_fr }} @endif</textarea>
                    <p class="error error_description_fr"></p>
                </div>

                <input value="@if($hotel->id) {{ $hotel->id }} @endif" type="hidden" name="id">
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

function mergeModelRefrences () {
    
}

</script>

@endsection