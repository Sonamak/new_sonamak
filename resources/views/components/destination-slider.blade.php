@if(count($destinations))
<div class="main_title_3">
    <span><em></em></span>
    <h2>{{__('main.discover_our_destinations')}}</h2>
    <p>{{__('main.point_your_next_great_adventure_with_us')}}</p>
</div>
<div id="reccomended_adventure" class="owl-carousel owl-theme ">
    @foreach($destinations as $destination)
    <div class="item">
        <x-destination-box :destination="$destination"></x-destination-box>
    </div>
    @endforeach
</div>
@endif