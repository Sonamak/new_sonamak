@extends('admin.layouts.app')

@section('content')

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Active Links</h4>
        </div>
        <div class="schdeule_list container-fluid"> 
            <form class="ajax-form mt-5" action="{{ route('schedule.store') }}" method="post" refresAfterSend>
                <div class="row">
                    <div class="form-group w-100 mx-2">
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Home Page</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 1]) }}" id="myonoffswitch_1" @if($active->where('page','home')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_1">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Extra Tours</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 3]) }}" id="myonoffswitch_3" @if($active->where('page','extra')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_3">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Blog</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 9]) }}" id="myonoffswitch_9" @if($active->where('page','blog')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_9">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">About</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 4]) }}" id="myonoffswitch_4" @if($active->where('page','about')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_4">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Destination Page</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 2]) }}" id="myonoffswitch_2" @if($active->where('page','destinations')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_2">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Terms Page</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 7]) }}" id="myonoffswitch_7" @if($active->where('page','terms')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_7">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">FAQ Page</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 6]) }}" id="myonoffswitch_6" @if($active->where('page','faq')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_6">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row w-100 py-3">
                            <div class="col-md-6">
                                <p class="h6">Privacy</p>
                            </div>
                            <div class="col-md-6">
                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Active </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox  switch"  route="{{ route('active.toggle',['activeLink' => 5]) }}" id="myonoffswitch_5" @if($active->where('page','privacy')->first()->active) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_5">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection