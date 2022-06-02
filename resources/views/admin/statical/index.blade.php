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
                <h2 class="card-title">Add statical</h2>
            </div>
            <div>
                <form class="form statical-form ajax-form" action="{{ route('statical.store') }}" method="post" refreshAfterSend swalOnFail="Howdy, you made some errors">
                    <div class="form-group mb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" id="name" type="text" placeholder="Name" name="name">
                                <p class="error error_name pt-2 mb-2"></p>
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" id="image" type="number" name="number" placeholder="Numbers">
                                <p class="error error_number pt-2 mb-2"></p>
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
    <div class="statical_container">
        @foreach($staticals as $statical)
        <div class="card wide-card w-100 d-flex align-items-center p-4" id="statical_{{$statical->id}}">
            <div class="row w-100 h-100">
                <div class="col-md-8">
                    <div class="card-content w-100 d-flex" >
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Name</p>
                            <p class="content">{{ $statical->name }}</p>
                        </div>
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Number</p>
                            <p class="content">{{ $statical->number }}</p>
                        </div>
                        <div class="card-collection ps-5 mb-0">
                            <p class="title">Add date:</p>
                            <p class="content">{{ date("d F, Y", strtotime($statical->created_at));  }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 h-100">
                    <div class="actions w-100 d-flex justify-content-end align-items-center h-100">
                        <button class="btn-secondary mx-2 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('statical.delete',['statical'=>$statical->id]) }}" delete_id="{{ $statical->id }}" callback="deletestatical">
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
                url: `/admin-panal/$staticals/load?page=${page}`,
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
                        $('.statical_container').append(build(element))
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

    function addstatical(e) {
        let payload = e.payload[0];
        $('.statical_container').append(build(payload))
    }

    function build (payload) {
        let deleteUrl = '{{ route("statical.delete", ":id") }}';
        console.log(payload);
        let image = (payload.image) ? '/storage/Images/small/'+payload.image.name : "{{ asset('Images/system/loading.png') }}";
        deleteUrl = deleteUrl.replace(':id', payload.id);
        return `
            <div class="card wide-card w-100 d-flex align-items-center p-4">
                <div class="row w-100 h-100">
                    <div class="col-md-1">
                        <img src="${image}" class="display w-100" alt="statical">
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
                        <form class="form statical-form ajax-form" action="${deleteUrl}" method="statical">
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

    function deletestatical(e) {

        $(`#statical_${e.payload.id}`).remove();

        if( ! $('.staticals').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }

</script>
@endsection('js')