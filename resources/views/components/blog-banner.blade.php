@if($banner)

<section class="hero_in general start_bg_zoom" style="background: url({{ asset('storage/banner/large/'.$banner->background->name) }});background-size:cover ;">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp animated"><span></span>{!! get_local($banner->header_text_in_english,$banner->header_text_in_french) !!}</h1>
        </div>
    </div>
</section>
@endif