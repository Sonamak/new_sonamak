<div class="item">
    <a href="{{ route('destinations.tours',['destination' => $destination->id]) }}" class="grid_item_adventure">
        <figure>
            <img src="{{ asset('storage/destination/medium/'.$destination->thumbnail->name) }}" class="img-fluid" alt="">
            <div class="info">
                <em>{{ get_local($destination->country_name_en,$destination->country_name_fr) }}</em>
            </div>
        </figure>
    </a>
</div>