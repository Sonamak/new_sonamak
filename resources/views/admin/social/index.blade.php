@extends('admin.layouts.app')

@section('css')
<link href="{{ asset('admin/css/custom-cards.css') }}" rel="stylesheet" test>
@endsection

@section('content')
<!-- container -->
<div class="main-container container-fluid pt-4">
    <div class="card custom-card">
        <div class="card-body">
            <div>
                <h2 class="card-title">Add social</h2>
            </div>
            <div>
                <form class="form social-form ajax-form" action="{{ route('social.store') }}" method="post" refreshAfterSend swalOnFail="Howdy, you made some errors">
                    <div class="form-group mb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <select name="type" class="form-control form-select select2" data-bs-placeholder="Select Country" readonly>
                                    <option value="facebook">Facebook</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="instgram">Instgram</option>
                                    <option value="whatsapp" selected>What's App</option>
                                    <option value="phone" selected>Phone</option>
                                    <option value="email" selected>Email</option>
                                    <option value="location" selected>Location</option>
                                </select>
                                <p class="error error_type"></p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" id="name" type="text" placeholder="Name" name="value">
                                <p class="error error_value pt-2 mb-2"></p>
                            </div>
                           
                        </div>
                    </div>
                    <button class="btn btn-primary  justify-content-center align-items-center ms-auto next_form form_btn ajax-btn">
                        <div class="d-flex align-items-center">
                            <span class="btn-txt">Submit</span>
                            <i class="icon ion-ios-arrow-forward ms-2 arrow"></i>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="social_container">
        @foreach($socials as $social)
        <div class="card wide-card w-100 d-flex align-items-center p-4" id="social_{{$social->id}}">
            <div class="row w-100 h-100">
                <div class="col-md-8">
                    <div class="card-content w-100 d-flex" >
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Name</p>
                            <p class="content">{{ $social->value }}</p>
                        </div>
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Type</p>
                            <p class="content">{{ $social->type }}</p>
                        </div>
                        <div class="card-collection ps-5 mb-0">
                            <p class="title">Add date:</p>
                            <p class="content">{{ date("d F, Y", strtotime($social->created_at));  }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 h-100">
                    <div class="actions w-100 d-flex justify-content-end align-items-center h-100">
                        <button class="btn-secondary mx-2 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('social.delete',['social'=>$social->id]) }}" delete_id="{{ $social->id }}" callback="deletesocial">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('component_script')
<script>
    let allowLoad = true;
    let page = 2;
    let allLoaded = false;
    $(window).scroll(function(){
        // let scrolledHeight = ($('body').height() - $(window).height()) - $(this).scrollTop();
        // let loadHeight = 100;
        if(allowLoad && ! allLoaded) {
            if(Math.floor($(window).scrollTop()) == $(document).height() - $(window).height()) {

            $.ajax({
                url: `/admin-panal/$socials/load?page=${page}`,
                beforeSend: () => {
                    allowLoad = false;
                },
                success: (e) => {
                    let payload = e.data;

                    allowLoad = true;

                    if(e.last_page == page)
                        allLoaded = true;
                    else
                        page++;

                    payload.forEach((element) => {
                        $('.social_container').append(build(element))
                    })
                }
            })
        }
        }
    });

    $(document).on('click','.close-btn',function(){
        $(this).closest('.wide-card').fadeOut('slow',function(){
            $(this).remove()
        });
    });

    function addsocial(e) {
        let payload = e.payload[0];
        $('.social_container').append(build(payload))
    }

    function build (payload) {
        let deleteUrl = '{{ route("social.delete", ":id") }}';
        console.log(payload);
        let image = (payload.image) ? '/storage/Images/small/'+payload.image.name : "{{ asset('Images/system/loading.png') }}";
        deleteUrl = deleteUrl.replace(':id', payload.id);
        return `
            <div class="card wide-card w-100 d-flex align-items-center p-4">
                <div class="row w-100 h-100">
                    <div class="col-md-1">
                        <img src="${image}" class="display w-100" alt="social">
                    </div>
                    <div class="col-md-7">
                        <div class="card-content w-100 d-flex" >
                            <div class="card-collection ps-4 mb-0">
                                <p class="title">Name</p>
                                <p class="content">${payload.name}</p>
                            </div>
                            <div class="card-collection ps-5 mb-0">
                                <p class="title">Add date:</p>
                                <p class="content">
                                ${new Date(payload.created_at).toLocaleDateString("en-US", { year: 'numeric', month: 'short', day: 'numeric' })}
                                </p>
                            </div>
                            <div class="card-collection ps-5 mb-0">
                                <p class="title">Add by:</p>
                                <p class="content">${payload.user.name}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 h-100">
                    <div class="actions w-100 d-flex justify-content-end align-items-center h-100">
                        <form class="form social-form ajax-form" action="${deleteUrl}" method="social">
                            <button class="btn">
                                <i class="zmdi zmdi-close-circle close-btn btn delete"></i>
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        `
    }

    function deletesocial(e) {

        $(`#social_${e.payload.id}`).remove();

        if( ! $('.socials').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }

</script>
@endsection('js')