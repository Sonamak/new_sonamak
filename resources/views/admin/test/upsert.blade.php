@extends('admin.layouts.app')

@section('content')

@php
$route = explode('.',request()->route()->getName());
$route = array_shift($route) .'.store';
@endphp 

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">{{ $test->id ? 'Update Instance' : 'Add Instance' }}</h4>
        </div>
        <form class="ajax-form" method="post" action="{{ route($route) }}" appendToData="mergeModelRefrences" redirect="{{ route('test') }}">
            <div class="card-body card-full">

            <div class="mb-4">
                <p class="mg-b-10">Multiple Select</p>
                <select multiple="multiple" class="testselect2" name="test[]">
                    <option selected value="eg1">eg1</option>
                    <option value="saab">Saab</option>
                    <option value="eg2">eg2</option>
                    <option value="eg3">eg3</option>
                </select>
            </div>

                <input value="@if($test->id) {{ $test->id }} @endif" type="hidden" name="id">
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