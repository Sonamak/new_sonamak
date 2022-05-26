@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid" route="{{ route('test.more') }}">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">test List</h4>
            <a href="{{ route(request()->route()->getName().'.upsert') }}" class="d-block ms-auto">
                <button class=" btn btn-primary ">
                    <i class="icon ion-ios-add"></i>
                    Add New
                </button>
            </a>
        </div>
        <div class="card-body">
            <div class="append-container">
                @foreach($tests as $test)


                    <div class="row mt-4 tests" id="test_{{$test->id}}">
                        <div class="col-md-3">
                            <img width="260px" height="161px" src="@if($test->thumbnail) {{ asset('storage/test/small/'.$test->thumbnail->name) }} @else @endif" alt="{{ $test->tite_en }}">
                        </div>
                        <div class="col-md-9">
                            <h3 class="section_title">
                                {{ $test->title }}
                            </h3>
                            <p class="col-md-8 mx-0 px-0 sub-text">
                                {{ substr(strip_tags($test->description),0,200).'...' }}
                            </p>
                            <div class="d-flex align-items-center col-md-8 p-0">
                                <a href="{{ route('test.upsert',['test' => $test->id]) }}">
                                    <button class="btn btn-primary">Edit</button>
                                </a>
                                <button class="btn-secondary mx-2 delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('test.delete',['test'=>$test->id]) }}" delete_id="{{ $test->id }}" callback="deletetest">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>

                @endforeach

                <p class="empty_section w-100 text-center @if( $tests->total() )  d-none  @endif"> No tests Avaliable to Display </p>
               
            </div>

            @if ( $tests->lastPage() != $tests->currentPage() )
            <div class="w-100 d-flex justify-content-center mt-2">
                <button class="btn btn-primary mx-auto load_more">
                    Load More
                </button>
            </div>
            @endif
        </div>
    </div>
</div>
<div class="main-container container-fluid">
{{ $tests->links() }}
</div>
@section('component_script')
<script>


    function deletetest(e) {

        $(`#test_${e.payload.id}`).remove();

        if( ! $('.tests').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();

    }


</script>
@endsection
@endsection