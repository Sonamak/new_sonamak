

<div class="widget">
    <div class="widget-title">
        <h4>{{__('main.recent_posts')}}</h4>
    </div>
    <ul class="comments-list">
        @foreach($blogs as $blog)
        <x-recent-blog-box :blog="$blog"></x-recent-blog-box>
        @endforeach
    </ul>
</div>