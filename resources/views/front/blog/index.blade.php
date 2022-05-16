@extends('front.layouts.app')

@section('title') Home @endsection

@section('content')
<section class="hero_in general start_bg_zoom" style="background: url({{ asset('storage/blog/large/'.$blog->thumbnail->name) }} ) center center no-repeat; background-size:cover">
    <div class="wrapper">
        <div class="container">
            <h1 class="fadeInUp animated"><span></span>{{ get_local($blog->title_en,$blog->title_fr) }}</h1>
        </div>
    </div>
</section>
<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-9">
            <div class="bloglist singlepost">
                <h1>{{ get_local($blog->title_en,$blog->title_fr) }}</h1>
                <div class="postmeta">
                    <ul>
                        @if($blog->category_id)
                        <li>
                            <span>
                                <i class="icon_folder-alt"></i> 
                                {{ get_local($blog->category->name_en,$blog->category->name_fr) }}
                            </span>
                        </li>
                        @endif
                        <li>
                            <span>
                                <i class="icon_clock_alt"></i> 
                                {{ date('d M Y',strtotime($blog->created_at)) }}
                            </span>
                        </li>
                    </ul>
                </div>
                <!-- /post meta -->
                <div class="post-content overflow-hidden">
                    <div class="dropcaps">
                        <p>
                            {!! get_local($blog->article_in_en,$blog->article_in_fr) !!}
                        </p>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /single-post -->
            <hr>
        </div>
        <!-- /col -->

        <aside class="col-lg-3">
            <!-- /widget -->
            <x-recent-blog></x-recent-blog>
        </aside>
        <!-- /aside -->
    </div>
    <!-- /row -->
</div>
@endsection