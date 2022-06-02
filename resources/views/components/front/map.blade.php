<section class="customer_map mb-5 pt-5">
    @if($banner->background->name)
    <img src="{{ asset('storage/banner/large/'.$banner->background->name) }}" alt="our customer">
    @endif
</section>