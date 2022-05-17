<a href="tour-isotope.php" class="grid_item_adventure">
    <figure>
        <img src="{{ asset('storage/destination/medium_tall/'.$destination->thumbnail->name) }}" class="img-fluid dest_img" alt="">
        <div class="info">
            <em>{{ get_local($destination->country_name_en,$destination->country_name_fr) }}</em>
            <h3>{{ get_local($destination->caption_in_en,$destination->caption_in_fr) }}</h3>
        </div>
    </figure>
</a>