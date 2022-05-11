@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid" route="{{ route('price.more') }}">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">price List</h4>
            <a href="{{ route(request()->route()->getName().'.upsert') }}" class="d-block ms-auto">
                <button class=" btn btn-primary ">
                    <i class="icon ion-ios-add"></i>
                    Add New
                </button>
            </a>
        </div>
        <div class="card-body">
            <div class="append-container">
                @foreach($prices as $price)


                    <div class="row mt-4 prices" id="price_{{$price->id}}">
                        <div class="col-md-9">
                            <h3 class="section_title">
                                {{ $price->name_en }}
                            </h3>
                            <p class="col-md-8 mx-0 px-0 sub-text">
                                {{ substr(strip_tags($price->description_en),0,200).'...' }}
                            </p>
                            <div class="details row">
                               <div class="col-md-6">
                                    <p class="details_name w-25">
                                        <span class="">
                                            Tour: 
                                        </span>
                                        <span>
                                            @if($price->tour)
                                            {{ $price->tour->title_en }}
                                            @else
                                            Unattached
                                            @endif
                                        </span>
                                    </p>
                               </div>
                               <div class="col-md-6">
                                    <p class="details_name w-25">
                                            <span class="">
                                                Package Numbers: 
                                            </span>
                                            <span>
                                                {{ $price->packages->count() }}
                                            </span>
                                    </p>
                               </div>
                            </div>
                            <div class="d-flex align-items-center col-md-8 p-0">
                                <a href="{{ route('price.upsert',['price' => $price->id]) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <button class="btn-secondary mx-2 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('price.delete',['price'=>$price->id]) }}" delete_id="{{ $price->id }}" callback="deleteprice">
                                    Delete
                                </button>

                                <div class="switcher mb-0 d-flex ms-auto">
                                    <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Best Selling </p>
                                    <div class="checkbox">
                                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox feature feature_price_check switch" model_id="{{ $price->id }}" id="myonoffswitch_{{$price->id}}" route="{{ route('price.top',['price' => $price->id ]) }}" @if($price->best_selling) checked @endif>
                                        <label class="onoffswitch-label mb-0" for="myonoffswitch_{{$price->id}}">
                                        <span class="onoffswitch-inner"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach

                <p class="empty_section w-100 text-center @if( $prices->total() )  d-none  @endif"> No prices Avaliable to Display </p>
               
            </div>

            @if ( $prices->lastPage() != $prices->currentPage() )
            <div class="w-100 d-flex justify-content-center mt-2">
                <button class="btn btn-primary mx-auto load_more">
                    Load More
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<script>


    function deleteprice(e) {

        $(`#price_${e.payload.id}`).remove();

        if( ! $('.prices').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }

    
    let page = 2;

    $('.load_more').on('click',function () {
        $.ajax({
                url: `{{ route("price.more") }}?page=${page}`,
                type: 'post',
                success: function (e) {
                    
                    let payload = e.payload.data;

                    console.log(e.payload.current_page , e.payload.total)

                    if ( e.payload.current_page < e.payload.total ) 
                        page++
                    else 
                        $('.load_more').addClass('d-none');


                    console.log(page)

                    payload.forEach((item) => {
                        
                        let thumbnail = item.gallaries.find(x => x.use_for == 'thumbnail');

                        $('.append-container').append(`
                        

                        <div class="row mt-4">
                                <div class="col-md-9">
                                    <h3 class="section_title">
                                        ${item.title_en}
                                    </h3>
                                    <p class="col-md-8 mx-0 px-0 sub-text">
                                        ${item.description_en.replace(/<[^>]*>?/gm, '').substring(0,200)}
                                    </p>
                                    <div class="d-flex align-items-center col-md-8 p-0">
                                        <a href="price/upsert/${item.id}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
                                        <button class="btn-secondary mx-2" delete_message="Slow Down Howdy! We Have to warn you that this action is irrevesable and this data will be permenantly delete" route="/price/delete/${item.id}" delete_id="${item.id}">
                                            Delete
                                        </button>

                                        <div class="switcher mb-0 d-flex ms-auto">
                                            <p class="sub-text m-0 feature-txt mx-2 mt-2"> Mark As Feature </p>
                                            <div class="checkbox">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox feature feature_price_check" model_id="${item.id}" id="myonoffswitch_${item.id}" >
                                                <label class="onoffswitch-label mb-0" for="myonoffswitch_${item.id}">
                                                <span class="onoffswitch-inner"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                
                           

                        `);

                        if( item.feature ) $(`#myonoffswitch_${item.id}`).attr('checked','checked')
;

                        console.log($(`#myonoffswitch_${item.id}`),item.feature)

                    })

                }   
            })
    })


</script>
@endsection