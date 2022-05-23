@extends('front.layouts.app')

@section('title') Contact Us @endsection

@section('content')
<x-contact-hero></x-contact-hero>
<div class="bg_color_1">
    <div class="container margin_80_55">
        <div class="row justify-content-between">
            <x-contact-map></x-contact-map>
            <div class="col-lg-6">
                <h4>{{__('main.send_a_message')}}</h4>
                <div id="message-contact"></div>
                <form method="post" action="{{ route('contact') }}" class="ajax-form" autocomplete="off" resetAfterSend swalOnSuccess="{{__('main.we_will_contact_you_soon')}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{__('main.name')}}</label>
                                <input class="form-control" type="text" name="name">
                                <p class="error error_name"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('main.email')}}</label>
                                <input class="form-control" type="email" name="email">
                                <p class="error error_email"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{__('main.telephone')}}</label>
                                <input class="form-control" type="text" name="telephone">
                                <p class="error error_telephone"></p>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                    <div class="form-group">
                        <label>{{__('main.message')}}</label>
                        <textarea class="form-control"  name="message" style="height:150px;"></textarea>
                        <p class="error error_message"></p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <p class="add_top_30"><input type="submit" value="{{__('main.submit')}}" class="btn_1 rounded" id="submit-contact"></p>
                </form>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection