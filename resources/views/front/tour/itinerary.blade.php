<div id="itinerary">
    <h3>{{__('main.itinerary')}}</h3>
    <p>
        {!! get_local($tour->itinerary_description_en,$tour->itinerary_description_fr) !!}
    </p>
    <ul class="cbp_tmtimeline">
        @foreach($tour->itinerarie as $itinerarie)
        <li>
            <time class="cbp_tmtime pt-2" datetime="09:30"><span>Day {{$itinerarie->day}}</span>
            </time>
            <div class="cbp_tmicon">
                {{ $loop->index + 1 }}
            </div>
            <div class="cbp_tmlabel">
                <h4>{{ get_local($itinerarie->title_en,$itinerarie->title_fr) }}</h4>
                <p>
                    {{ get_local($itinerarie->description_en,$itinerarie->description_fr) }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
    <hr>
</div>