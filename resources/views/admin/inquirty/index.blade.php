@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

<div class="category_container ">
    @foreach($inquirties as $inquirty)
        <div class="card wide-card w-100 d-flex align-items-center p-4 mt-2">
            <div class="row w-100 h-100">
                <div class="col-md-12">
                    <div class="card-content w-100 d-flex" >
                        <div class="row w-100">
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Name</span>
                                <span>{{ $inquirty->name }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Email</span>
                                <a href="mailto: $inquirty->email" class="linked">{{ $inquirty->email }}</span>
                            </div>
                            <div class="flex col-md-4">
                                <span class="tag">Phone</span>
                                <a href="tel: {{$inquirty->telephone}} " class="linked">{{ $inquirty->telephone }}</a>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Department Date</span>
                                <span>{{ date('d M Y',strtotime($inquirty->department)) }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Return Date</span>
                                <span>{{ date('d M Y',strtotime($inquirty->return)) }}</span>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="tag">Inquiry</div>
                                <div>{{ $inquirty->inquiry }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $inquirties->links() }}
</div>
</div>
@endsection