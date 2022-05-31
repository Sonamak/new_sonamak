@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid mt-4" route="{{ route('contact.more') }}">
    @foreach($contacts as $contact)
        <div class="card p-3">
            <div class="col-md-6">
                <p>
                    <span>
                        Name: 
                    </span>
                    <span>
                        {{ $contact->name }}
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <span>
                        Email: 
                    </span>
                    <a href="mailto:{{ $contact->email }}">
                        {{ $contact->email }}
                    </span>
                </p>
            </div>
            <div class="col-md-6">
                <p>
                    <span>
                        Phone: 
                    </span>
                    <a href="tel:{{ $contact->phone }}">
                        {{ $contact->phone }}
                    </span>
                </p>
            </div>
            <div class="col-md-12">
                <p>
                    <span>
                        Content: 
                    </span>
                    <span class="d-block">
                        {{ $contact->content }}
                    </span>
                </p>
            </div>
        </div>
    @endforeach
</div>
<div class="main-container container-fluid">
{{ $contacts->links() }}
</div>
@section('component_script')
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>


    function deletecontact(e) {

        $(`#contact_${e.payload.id}`).remove();

        if( ! $('.contacts').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }


</script>
@endsection
@endsection