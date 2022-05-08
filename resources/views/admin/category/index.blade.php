@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
<div class="card custom-card  mt-3">
    <div class="card-body">
        <div>
            <h2 class="card-title">Add category</h2>
        </div>
        <div>
            <form class="form category-form ajax-form" action="{{ route('category.store') }}" method="post" refreshAfterSend>
                <div class="form-group mb-0">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name_en" class="form-control" placeholder="Name In English">
                            <p class="error error_name_en pt-2"></p>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="name_fr" class="form-control" placeholder="Name In French">
                            <p class="error error_name_fr pt-2"></p>
                        </div>
                        <div class="col-md-4">
                            <select name="type" class="form-control">
                                <option value="tour_type">Tour Type</option>
                                <option value="blog_type">Blog Type</option>
                            </select>
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
<div class="category_container ">
    @foreach($categorys as $category)
        <div class="card wide-card w-100 d-flex align-items-center p-4" id="category_{{$category->id}}">
            <div class="row w-100 h-100">
                <div class="col-md-8">
                    <div class="card-content w-100 d-flex" >
                        <div class="card-collection ps-4 mb-0">
                            <p class="title">Type</p>
                            <p class="content">
                                @if($category->type == 'tour_type')
                                Tour Type
                                @elseif($category->type == 'blog_type')
                                Blog Type
                                @endif
                            </p>
                        </div>
                        <div class="card-collection ps-5 mb-0">
                            <p class="title">Name In English </p>
                            <p class="content">{{$category->name_en}}</p>
                        </div>
                        <div class="card-collection ps-5 mb-0">
                            <p class="title">Name In French</p>
                            <p class="content">{{$category->name_fr}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 h-100">
                    <div class="actions w-100 d-flex justify-content-end align-items-center h-100">
                        <form class="form category-form ajax-form" action="" method="post">
                            <button class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModel"  route="{{ route('category.delete',['category'=>$category->id]) }}" delete_id="{{ $category->id }}" callback="deletecategory">
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

    function deletecategory(e)
    {
        $(`#category_${e.payload.id}`).remove();

        if( ! $('.blogs').length ) {

            $('.empty_section').removeClass('d-none')

        }

        bootstrap.Modal.getInstance($('#deleteModel')).hide();
    }

</script>
</div>
@endsection