@extends('admin.layouts.app')

@section('content')

<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Schedule</h4>
        </div>
        <div class="schdeule_list container-fluid"> 
            <form class="ajax-form" action="{{ route('schedule.store') }}" method="post" refresAfterSend>
                <div class="row">
                    <div class="form-group col-md-12">
                        <div class="row mt-5">
                            <div class="col-md-6">
                                Saturday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[saturday][from]" value="@if($schedule->where('day','saturday')->first()){{$schedule->where('day','saturday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[saturday][to]" value="@if($schedule->where('day','saturday')->first()){{$schedule->where('day','saturday')->first()->to}}@endif">
                                <input type="hidden" name="schedule[saturday][day]" value="saturday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[saturday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_saturday" @if($schedule->where('day','saturday')->first())@if($schedule->where('day','saturday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_saturday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_saturday"></p>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Sunday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[sunday][from]" value="@if($schedule->where('day','sunday')->first()){{$schedule->where('day','sunday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[sunday][to]" value="@if($schedule->where('day','sunday')->first()){{$schedule->where('day','sunday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[sunday][day]" value="sunday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[sunday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_sunday" @if($schedule->where('day','sunday')->first())@if($schedule->where('day','sunday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_sunday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_sunday"></p>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Monday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[monday][from]" value="@if($schedule->where('day','monday')->first()){{$schedule->where('day','monday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[monday][to]" value="@if($schedule->where('day','monday')->first()){{$schedule->where('day','monday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[monday][day]" value="monday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[monday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_monday" @if($schedule->where('day','monday')->first())@if($schedule->where('day','monday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_monday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_monday"></p>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Tuesday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[tuesday][from]" value="@if($schedule->where('day','tuesday')->first()){{$schedule->where('day','tuesday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[tuesday][to]" value="@if($schedule->where('day','tuesday')->first()){{$schedule->where('day','tuesday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[tuesday][day]" value="tuesday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[tuesday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_tuesday" @if($schedule->where('day','tuesday')->first())@if($schedule->where('day','tuesday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_tuesday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_tuesday"></p>
                    </div>
                    <div class="form-group col-md-12" >
                        <div class="row">
                            <div class="col-md-6">
                                Wednesday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[wednesday][from]" value="@if($schedule->where('day','wednesday')->first()){{$schedule->where('day','wednesday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[wednesday][to]" value="@if($schedule->where('day','wednesday')->first()){{$schedule->where('day','wednesday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[wednesday][day]" value="wednesday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[wednesday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_wednsday" @if($schedule->where('day','wednesday')->first())@if($schedule->where('day','wednesday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_wednsday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_wednesday"></p>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Thursday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[thursday][from]" value="@if($schedule->where('day','thursday')->first()){{$schedule->where('day','thursday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[thursday][to]" value="@if($schedule->where('day','thursday')->first()){{$schedule->where('day','thursday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[thursday][day]" value="thursday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[thursday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_thursday" @if($schedule->where('day','thursday')->first())@if($schedule->where('day','thursday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_thursday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_thursday"></p>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                Friday
                            </div>
                            <div class="col-md-4 d-flex">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[friday][from]" value="@if($schedule->where('day','friday')->first()){{$schedule->where('day','friday')->first()->to}}@endif">
                                <input class="w-50 ms-2 form-control" type="time" name="schedule[friday][to]" value="@if($schedule->where('day','friday')->first()){{$schedule->where('day','friday')->first()->from}}@endif">
                                <input class="w-50 ms-2 form-control" type="hidden" name="schedule[friday][day]" value="friday">
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <label class="mx-2 d-block my-0">Holiday</label>
                                <div class="checkbox">
                                    <input type="checkbox" name="schedule[friday][holiday]" class="onoffswitch-checkbox feature switch"  id="myonoffswitch_friday"  @if($schedule->where('day','thursday')->first())@if($schedule->where('day','friday')->first()->holiday) checked @endif @endif>
                                    <label class="onoffswitch-label mb-0" for="myonoffswitch_friday">
                                    <span class="onoffswitch-inner"></span>
                                </div>
                            </div>
                        </div>
                        <p class="error error_schedule_friday"></p>
                    </div>
                </div>
                <button class="btn btn-primary">Save Schedule</button>
            </form>
        </div>
    </div>
</div>
@endsection