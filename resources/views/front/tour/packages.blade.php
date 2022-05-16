<div id="packages">
    <div class="">
        <div id="tabs" class="tabs">
            <nav>
                <ul class="price_tab row">

                @foreach($tour->prices as $price)
                <li class="col-md-4">
                    <a href="#section-{{$loop->index}}">
                        @if($price->price_type == 'regular')
                        <i class="pe-7s-paper-plane"></i>
                        @elseif($price->price_type == 'luxory')
                        <i class="pe-7s-plane"></i>
                        @elseif($price->price_type == 'ultra')
                        <i class="pe-7s-rocket"></i>
                        @endif
                        {{ get_local($price->name_en,$price->name_fr) }}
                        <em>{{get_local($price->caption_en,$price->caption_fr)}}</em>
                    </a>
                </li>
                @endforeach

                </ul>
            </nav>
            <div class="content">
                @foreach($tour->prices as $price)
                <section id="section-{{$loop->index}}">
                    <div class="row">
                        @if($price->lowest_season_packages->count())
                        <div class="col-lg-6">
                            <div class="box_pricing">
                                <h4>Low Season</h4>
                                <p>{{get_local($price->description_lower_season_en,$price->description_lower_season_fr)}}</p>
                                <hr>
                                <ul>
                                    @foreach($price->lowest_season_packages as $package)	
                                    <li>
                                        <strong>{{ __('main.'.get_local_string($package->room_type)) }}</strong> {{ __('main.starting_from') }}
                                        <div class="price">
                                            <sup>{{ currency_sympol() }}</sup>{{ currency_value($package) }}
                                        </div>
                                    </li>
                                    @if(! $loop->last) <hr> @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        @if($price->peak_season_packages->count())
                        <div class="col-lg-6">
                            <div class="box_pricing">
                                <h4>Peak Season</h4>
                                <p>{{get_local($price->description_upper_season_en,$price->description_lower_season_fr)}}</p>
                                <hr>
                                <ul>
                                    @foreach($price->peak_season_packages as $package)	
                                    <li>
                                        <strong>{{ __('main.'.get_local_string($package->room_type)) }}</strong> {{ __('main.starting_from') }}
                                        <div class="price">
                                            <sup>{{ currency_sympol() }}</sup>{{ currency_value($package) }}
                                        </div>
                                    </li>
                                    @if(! $loop->last) <hr> @endif
                                    @endforeach															
                                </ul>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /row -->
                    <h3>{{__('main.hotels')}}</h3>
                    <div class="hotels_container">
                        <div class="row">
                            @foreach($price->hotels as $hotel)
                            <div class="col-xl-6 col-lg-6 col-md-6 isotope-item position-relative" style="position: absolute; left: 0px; top: 0px;">
                                <div class="box_grid">
                                    <figure>
                                        <img src="{{ asset('storage/hotel/small/'.$hotel->thumbnail->name) }}" class="img-fluid" alt="" width="800" height="533">
                                    </figure>
                                    <div class="wrapper">
                                        <h3>
                                            <a style="color:#fd7e14">{{ get_local($hotel->title_en,$hotel->title_fr) }}</a>
                                        </h3>
                                        <p>{{ get_local($hotel->description_en,$hotel->description_fr) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @if(!$price->hotels->count())
                            <p class="text-center w-100">{{__('main.no_hotel_to_display')}}</p>
                            @endif
                        </div>
                    </div>
                    <!-- /isotope-wrapper -->
                </section>
                @endforeach
            </div>
            <!-- /content -->
        </div>
        <!-- /tabs -->
    </div>		
</div>