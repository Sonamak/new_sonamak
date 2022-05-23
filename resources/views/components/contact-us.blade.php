@if($banner)
<div class="call_section position-relative" style="background: url({{ asset('storage/banner/large/'.$banner->background->name) }});background-size:cover ;">
    <div class="top-0 left-0 w-100 h-100 position-absolute"></div>
    <div class="container clearfix">
        <div class="col-lg-5 col-md-6 float-right wow animated" data-wow-offset="250" style="visibility: visible;">
            <div class="block-reveal">
                <div class="block-vertical"></div>
                <div class="box_1">
                    <h3>{{get_local($banner->header_text_in_english,$banner->header_text_in_french)}}</h3>
                    <p>{{get_local($banner->upper_text_in_english,$banner->upper_text_in_french)}}</p>
                    <a href="{{ route('contact.form') }}" class="btn_1 rounded">{{__('main.contact_us')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif