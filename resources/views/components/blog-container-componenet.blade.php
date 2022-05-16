@if(count($blogs))
<div class="container margin_80_55">
        <div class="main_title_2">
            <span><em></em></span>
            <h3>{{__('main.our_last_blogs')}}</h3></h3>
            <p>{{__('main.read_journeys_around_the_world')}}</p>
        </div>
        <div class="row">
            
            <!-- /box_news -->
            @foreach($blogs as $blog)
            <x-blog-box-componenet :blog="$blog"></x-blog-box-componenet>
            @endforeach
            <!-- /box_news -->
        </div>
        <!-- /row -->
        <p class="btn_home_align">
            <a href="blog.php" class="btn_1 rounded">
                {{ __('main.view_all_news') }}
            </a>
        </p>
    </div>
    <!-- /container -->
</div>
@endif