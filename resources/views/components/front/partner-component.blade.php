<div class="partners mb-5 mt-5 pt-5">
    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach($partners as $partner)
            <div class="item">
                <img src="{{ asset('storage/partner/small/'.$partner->thumbnail->name) }}" alt="{{ $partner->name }}">
            </div>
            @endforeach
        </div>
    </div>
</div>