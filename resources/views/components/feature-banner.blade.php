@if($banner)
<div class="container container-custom margin_80_0 mb-5">
    <div class="banner mb-0" style="background: url({{ asset('storage/banner/large/'.$banner->background->name) }});background-size:cover ;">
        <div class="wrapper d-flex align-items-center opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.3)">
            <div>
                <h3>{!! get_local($banner->upper_text_in_english,$banner->upper_text_in_french) !!}</h3>
                <p>{!! get_local($banner->header_text_in_english,$banner->header_text_in_french) !!}</p>
                <a href="{{$banner->redirect}}" class="btn_1">{{ get_local($banner->button_text_in_english,$banner->button_text_in_french) }}</a>
            </div>
        </div>
    </div>
</div>
@endif