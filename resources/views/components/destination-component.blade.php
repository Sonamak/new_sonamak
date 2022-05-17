<div class="container container-custom margin_80_0">
    <section class="add_bottom_45">
        <div class="main_title_3">
            <span><em></em></span>
            <h2>{{__('main.popular_destination')}}</h2>
            <p>{{__('main.find_your_next_adventure')}}</p>
        </div>
        <div class="row">
            @foreach($destinations as $destination)
            <div class="col-xl-3 col-lg-6 col-md-6">
                <a href="{{route('destinations.tours',['destination' => $destination->id])}}" class="grid_item">
                    <figure>
                        <img src="{{ asset('storage/destination/large/'.$destination->thumbnail->name) }}" class="img-fluid" alt="">
                        <div class="info">
                            <h3>{{ get_local($destination->country_name_en,$destination->country_name_fr) }}</h3>
                        </div>
                    </figure>
                </a>
            </div>
            @endforeach
        </div>
        <!-- /row -->
        <a href="{{ route('destinations') }}"><strong>View all  <i class="arrow_carrot-right"></i></strong></a>
    </section>
</div>