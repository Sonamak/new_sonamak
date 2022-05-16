@if(count($tour->gallary))
<div id="gallary">
    <h3>{{ __('main.tour_gallary') }}</h3>
    <div class="pictures_grid magnific-gallery clearfix">
        @foreach($tour->gallary as $gallary)
        <figure>
            <a href="{{ asset('storage/tour/large/'.$gallary->name) }}" title="Photo title" data-effect="mfp-zoom-in">
                <img src="{{ asset('storage/tour/large/'.$gallary->name) }}" alt="">
            </a>
        </figure>
        @endforeach
    </div>
</div>
@endif