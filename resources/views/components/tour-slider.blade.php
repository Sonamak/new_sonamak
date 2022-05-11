<div class="container container-custom margin_80_0">
    <div class="main_title_2">
        <span><em></em></span>
        <h2>Feature Tours</h2>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
    </div>
   
    <div id="reccomended" class="owl-carousel owl-theme">
        @foreach($tours as $tour)
        <x-tour-slider-box :tour="$tour"></x-tour-slider-box>
        @endforeach
    </div>
    <!-- /carousel -->
    <!-- <p class="btn_home_align"><a href="tours-grid-isotope.php" class="btn_1 rounded">View all Tours</a></p> -->
    <hr class="large">
</div>
