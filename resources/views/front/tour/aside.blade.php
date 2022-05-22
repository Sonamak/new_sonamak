<aside class="col-lg-4" id="sidebar">
    <form class="ajax-form" method="post" action="{{ route('reserved') }}" swalOnSuccess="{{ __('main.we_will_contact_you_soon') }}" resetAfterSend>
        <div class="box_detail booking">
            <div class="form-group input-dates">
                <input class="form-control" type="text" name="dates" placeholder="{{__('main.when')}}.." name="date">
                <i class="icon_calendar"></i>
                <p class="error error_dates"></p>
            </div>
            <div class="panel-dropdown">
                <a href="#">{{__('main.guests')}} <span class="qtyTotal">1</span></a>
                <div class="panel-dropdown-content right">
                    <div class="qtyButtons">
                        <label>{{__('main.guests')}}</label>
                        <input type="text" name="qtyInput" value="1">
                    </div>
                </div>
            </div>
            <p class="error error_qtyInput"></p>
            <div class="form-group">
                <input class="form-control" type="text" name="name" placeholder="{{__('main.full_name')}}" name="name">
                <p class="error error_name"></p>
            </div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="{{__('main.email')}}" name="email">
                <p class="error error_email"></p>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="nationality" placeholder="{{__('main.nationality')}}" name="nationality">
                <p class="error error_nationality"></p>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="{{__('main.telephone')}}" name="telephone">
                <p class="error error_telephone"></p>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="requirments" placeholder="{{__('main.please_advise_your_tour_requirements')}}" name="requirments"></textarea>
            </div>																																										
            <button class="btn_1 full-width purchase">{{__('main.submit_inquiry')}}</button>
            <div class="text-center"><small>{{__('main.no_money_charged_in_this_step')}}</small></div>
        </div>
        <ul class="share-buttons">
            <li><a class="fb-share" href="{{ route('share',['provider' => 'facebook']) }}" target="__blank"><i class="social_facebook"></i> Share</a></li>
            <li><a class="twitter-share" href="{{ route('share',['provider' => 'twitter']) }}" target="__blank"><i class="social_twitter"></i> Tweet</a></li>
        </ul>
    </form> 
</aside>