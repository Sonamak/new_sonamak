@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

<div class="category_container ">
    @foreach($contacts as $contact)
        <div class="card wide-card w-100 d-flex align-items-center p-4 mt-2">
            <div class="row w-100 h-100">
                <div class="col-md-12">
                    <div class="card-content w-100 d-flex" >
                        <div class="row w-100">
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Name</span>
                                <span>{{ $contact->name }}</span>
                            </div>
                            <div class="flex col-md-4 mt-2">
                                <span class="tag">Email</span>
                                <a href="mailto: $contact->email" class="linked">{{ $contact->email }}</span>
                            </div>
                            <div class="flex col-md-4">
                                <span class="tag">Phone</span>
                                <a href="tel: {{$contact->telephone}} " class="linked">{{ $contact->telephone }}</a>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="tag">Contact</div>
                                <div>{{ $contact->message }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $contacts->links() }}
</div>
</div>
@endsection