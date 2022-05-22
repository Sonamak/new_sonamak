@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

<div class="category_container ">
    @foreach($reservations as $reservation)
        <div class="card wide-card w-100 d-flex align-items-center p-4 mt-2">
            <div class="row w-100 h-100">
                <div class="col-md-12">
                    <div class="card-content w-100 d-flex" >
                        <div class="row w-100">
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Name</span>
                                <span>{{ $reservation->name }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Email</span>
                                <a href="mailto: $reservation->email" class="linked">{{ $reservation->email }}</span>
                            </div>
                            <div class="flex col-md-4">
                                <span class="tag">Phone</span>
                                <a href="tel: {{$reservation->telephone}} " class="linked">{{ $reservation->telephone }}</a>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Department Date</span>
                                <span>{{ date('d M Y',strtotime($reservation->from)) }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Return Date</span>
                                <span>{{ date('d M Y',strtotime($reservation->to)) }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Guests</span>
                                <span>{{ $reservation->guests }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Nationality</span>
                                <span>{{ $reservation->nationality }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Tour</span>
                                <span>@if($reservation->tour) {{$reservation->tour->title_en}} @else  un attached @endif</span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="tag">Requirments</div>
                                <div>{{ $reservation->requirments }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $reservations->links() }}
</div>
</div>
@endsection