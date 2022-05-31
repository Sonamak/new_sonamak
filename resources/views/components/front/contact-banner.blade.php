 <!-- Inspiro Slider -->
 @if($banner->background)
 <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
    <!-- Slide 2 -->
    <div class="slide kenburns"  style="background-image:url('{{ asset('storage/banner/large/'.$banner->background->name) }}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="slide-captions text-center text-light">
                <!-- Captions -->
                <span class="strong">{{ $banner->header_text }}</span>
                <h1>{{ $banner->lower_text }}</h1>
                <!-- end: Captions -->
            </div>
        </div>
    </div>
    <!-- end: Slide 2 -->

</div>
@endif

<!--end: Inspiro Slider -->