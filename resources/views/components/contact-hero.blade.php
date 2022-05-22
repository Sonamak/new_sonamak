<section class="hero_in contacts" style="background: url({{ asset('storage/banner/large/'.$banner->background->name) }} ) center center no-repeat; background-size:cover">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp">
                <span></span>
                {{ get_local($banner->header_text_in_english,$banner->header_text_in_french) }}
            </h1>
        </div>
    </div>
</section>
<div class="contact_info">
    <div class="container">
        <ul class="clearfix">
            @if( $contact->where('type','location')->first() )
            <li>
                <i class="pe-7s-map-marker"></i>
                <h4>Address</h4>
                <span>{{ $contact->where('type','location')->first()->value }}</span>
            </li>
            @endif
            @if( $contact->where('type','email')->first() )
            <li>
                <i class="pe-7s-mail-open-file"></i>
                <h4>Email address</h4>
                <span>{{ $contact->where('type','email')->first()->value }}</small></span>

            </li>
            @endif
            @if( $contact->where('type','phone')->first() )
            <li>
                <i class="pe-7s-phone"></i>
                <h4>Contacts info</h4>
                <span>{{ $contact->where('type','phone')->first()->value }}</small></span>
            </li>
            @endif
        </ul>
    </div>
</div>