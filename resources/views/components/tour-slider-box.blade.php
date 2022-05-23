<div class="box_grid">
    <figure>
        <a href="{{ route('tour.details',['tour'=>$tour->id]) }}">
            <img src="@if($tour->thumbnail){{ asset('storage/tour/medium/'.$tour->thumbnail->name)@endif }}" class="img-fluid" alt="" width="800" height="533">
            <div class="read_more">
                <span>{{__('main.view_details')}}</span>
            </div>
        </a>
        @if($tour->category)
        <a href="{{ route('discover',['category' => $tour->category_id]) }}">
            <small>
                {{ get_local($tour->category->name_en,$tour->category->name_fr) }}
            </small>
        </a>
        @endif
    </figure>
    <div class="wrapper">
        <h3>
            <a href="{{ route('tour.details',['tour'=>$tour->id]) }}">
                {{ substr(get_local($tour->title_en,$tour->title_fr),0,40) }}
            </a>
        </h3>
        <p>
            @if(Config::get('app.locale') == 'en')
            {{ substr(strip_tags($tour->description_en),0,80).'...'; }}
            @else 
            {{ substr(strip_tags($tour->description_fr),0,80).'...'; }}
            @endif
        </p>
        <span class="price">{{__('main.from')}}<strong>@if($tour->lowest_price_package) {{ $tour->lowest_price_package_currency }} {{ currency_sympol() }} @else Not Set @endif</strong> /@if($tour->lowest_price_package) {{ __('main.'.$tour->lowest_price_package_room) }} @else Not Set @endif</span>
    </div>
    <ul class="d-flex">
        <li><i class="icon_clock_alt mx-2"></i>{{get_local($tour->duration_text_in_en,$tour->duration_text_in_fr)}}</li>
    </ul>
</div>
