<footer>
    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-5 col-md-12 p-r-5">
                <p><img src="{{ asset('storage/system/small/'.app()->make('setup',['type' => 'website footer logo'])[0]) }}" height="50" alt=""></p>
                <p>
                    @if(Config::get('app.locale') == 'en')
                    {{ app()->make('setup',['type' => 'website footer description english'])[0] }}
                    @else 
                    {{ app()->make('setup',['type' => 'website footer description french'])[0] }}
                    @endif
                </p>
                <div class="follow_us">
                    <ul>
                        <li>{{ __('main.follow_us') }}</li>
                        @if($socials->where('type','facebook')->count())
                        <li>
                            <a href="{{ $socials->where('type','facebook')->first()->value }}" target="_blank">
                                <i class="ti-facebook"></i>
                            </a>
                        </li>
                        @endif
                        @if($socials->where('type','twitter')->count())
                        <li>
                            <a href="{{ $socials->where('type','twitter')->first()->value }}" target="_blank">
                                <i class="ti-twitter"></i>
                            </a>
                        </li>
                        @endif
                        @if($socials->where('type','pintrest')->count())
                        <li>
                            <a href="{{ $socials->where('type','pintrest')->first()->value }}" target="_blank">
                                <i class="ti-pinterest"></i>
                            </a>
                        </li>
                        @endif
                        @if($socials->where('type','twitter')->count())
                        <li>
                            <a href="{{ $socials->where('type','twitter')->first()->value }}" target="_blank">
                                <i class="ti-youtube"></i>
                            </a>
                        </li>
                        @endif
                        @if($socials->where('type','instagram')->count())
                        <li>
                            <a href="{{ $socials->where('type','instagram')->first()->value }}" target="_blank">
                                <i class="ti-instagram"></i>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ml-lg-auto">
                <h5>{{ __('main.explore') }}</h5>
                <ul class="links">
                    @foreach($footer_usefull_links as $footer_usefull_link) 
                    <li>
                        <a href="index.php">{{ __('main.'.$footer_usefull_link->page) }}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5>{{ __('main.contact_us') }}</h5>
                <ul class="contacts">
                    @if($socials->where('type','whatsapp')->count())
                    <li>
                        <a href="https://api.whatsapp.com/send/?phone={{$socials->where('type','whatsapp')->first()->value}}" class="d-flex">
                        <i>
                        <svg width="17" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                        </i>    
                        {{$socials->where('type','whatsapp')->first()->value}}
                        </a>
                    </li>
                    @endif
                    @if($socials->where('type','phone')->count())
                    <li><a href="tel: {{$socials->where('type','phone')->first()->value}}"><i class="ti-mobile"></i> {{$socials->where('type','phone')->first()->value}}</a></li>
                    @endif
                    @if($socials->where('type','email')->count())
                    <li><a href="mailto: {{$socials->where('type','email')->first()->value}}"><i class="ti-email"></i> info@godiscoveregypt.com</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!--/row-->
        <div class="row">
            <div class="col-lg-6">
                <ul id="footer-selector">
                    <li>
                        <div class="styled-select" id="lang-selector">
                            <select class="language_dropdown cookie_dropdown" data="language">
                                <option value="en" @if(app()->make('saved_cookie',['type' => 'language']) == 'en') selected @endif>English</option>
                                <option value="fr"  @if(app()->make('saved_cookie',['type' => 'language']) == 'fr') selected @endif>French</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select" id="currency-selector">
                            <select class="currency_dropdown cookie_dropdown" data="currency">
                                <option value="cad"    @if(app()->make('saved_cookie',['type' => 'currency']) == 'cad') selected @endif>Candian Dollars</option>
                                <option value="usd" @if(app()->make('saved_cookie',['type' => 'currency']) == 'usd') selected @endif @if(!app()->make('saved_cookie',['type' => 'currency']) == 'usd') selected @endif>US Dollars</option>
                                <option value="eur"    @if(app()->make('saved_cookie',['type' => 'currency']) == 'eur') selected @endif>Euro</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select inquiry_btn " data-toggle="modal" data-target="#inquiry">
                            <span class="ml-2">Submit Inquiry</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul id="additional_links">
                    @foreach($footer_helper_links as $footer_helper_link) 
                    <li>
                        <a href="index.php">{{ __('main.'.$footer_helper_link->page) }}</a>
                    </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <!--/row-->
        <hr>
        <div class="row" style="justify-content: center;">
            <ul id="additional_links">
                <li><span>© 2022 Voyage Cleopatra &amp; Go Discover Egypt. All Rights Reserved.</span></li>
            </ul>	
        </div>
    </div>
</footer>
<!--/footer-->