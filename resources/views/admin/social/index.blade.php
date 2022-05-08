@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
<div class="card custom-card  mt-3">
    <div class="card-body">
        <div>
            <h2 class="card-title">Add contact</h2>
        </div>
        <div>
            <form class="form contact-form ajax-form" action="{{ route('social.store') }}" method="post" refreshAfterSend>
                <div class="form-group mb-0">
                    <div class="row">
                        <div class="col-md-4">
                            <select class="selectsum2 form-control" name="type">
                                <option value="phone">Phone</option> 
                                <option value="email">Email</option> 
                                <option value="location">Location</option>
                                <option value="whatsapp">Whatsapp</option> 
                                <option value="whatsapp">Facebook</option>                   
                                <option value="whatsapp">Twitter</option>                   
                                <option value="whatsapp">Instgram</option>                   
                                <option value="whatsapp">Pintrest</option>                   
                            </select>
                            <p class="error error_type pt-2"></p>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" id="from" type="text" placeholder="Contact" name="value">
                            <p class="error error_value pt-2"></p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary  justify-content-center align-items-center ms-auto next_form form_btn ajax-btn">
                    <div class="d-flex align-items-center">
                        <span class="btn-txt">Submit</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
<div class="contact_container ">
    @foreach($socials as $social)
        <div class="card wide-card w-100 d-flex align-items-center p-4" id="social_{{$social->id}}">
            <div class="row w-100 h-100">
                <div class="col-md-8">
                    <div class="card-content w-100 d-flex" >
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Type</p>
                            <p class="content">{{$social->type}}</p>
                        </div>
                        <div class="card-collection ps-5 mb-0">
                            <p class="title">Contact</p>
                            <p class="content">{{$social->value}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 h-100">
                    <div class="actions w-100 d-flex justify-content-end align-items-center h-100">
                        <form class="form contact-form ajax-form" action="" method="post">
                            <button class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('social.delete',['social'=>$social->id]) }}" delete_id="{{ $social->id }}" callback="deletesocial">
                                <i class="zmdi zmdi-close-circle close-btn btn delete"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>

    function deletesocial(e)
    {
        $(`#social_${e.payload.id}`).remove();

        if( ! $('.blogs').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();
    }

</script>
</div>
@endsection