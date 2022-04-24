@extends('admin.layouts.app')

@section('content')
<div class="main-container container-fluid">
    <div class="card mt-4 card-full">
        <div class="card-header w-100 d-flex">
            <h4 class="card-title mb-1">Tour List</h4>
            <a href="{{ route(request()->route()->getName().'.create') }}" class="d-block ms-auto">
                <button class=" btn btn-primary ">
                    <i class="icon ion-ios-add"></i>
                    Add New
                </button>
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="item" style="background-image:url(https://cf.bstatic.com/xdata/images/hotel/max1024x768/121894203.jpg?k=9669b114dc7a15482dc1451f8cf5e3bf362d7f9ce78db192ad2227a76de5c027&o=&hp=1);">
                        <div class="layer position-relative">
                            <a href="#" class="w-100 h-100 position-absolute start  top"></a>
                            <button class="delete_btn" delete_message="Slow Down Howdy! We Have to warn you that this action is irrevesable and this data will be permenantly delete" route="" delete_id="">
                                <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="21" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"></path></svg>
                            </button>
                            <div class="item-text">
                                <h3>Hawaii Caesar Palace Aqua Park</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection