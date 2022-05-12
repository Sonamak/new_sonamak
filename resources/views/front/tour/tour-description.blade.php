<div id="tour_description">
    <h2>{{__('main.description')}}</h2>
    {!! get_local($tour->description_en,$tour->description_fr) !!}
    <div class="row mt-3">
        <div class="col-lg-6 col-md-6">
            <a class="box_topic" href="#0">
                <span><i class="pe-7s-world"></i></span>
                <h3>{{ __('main.countries') }}</h3>
                <p>{{ get_local($tour->country_text_in_en,$tour->country_text_in_fr) }}</p>
            </a>
        </div>
        <div class="col-lg-6 col-md-6">
            <a class="box_topic" href="#0">
                <i class="pe-7s-timer"></i>
                <h3>{{ __('main.duration') }}</h3>
                <p>{{ get_local($tour->duration_text_in_en,$tour->duration_text_in_fr) }}</p>
            </a>
        </div>
    </div>
</div>