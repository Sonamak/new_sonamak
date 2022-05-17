@extends('front.layouts.app')

@section('title') Blogs @endsection

@section('content')
<div id="page">

        <!-- header -->

	<!-- /header --> 
        
        <main>
            
        <x-blog-banner></x-blog-banner>
		<!--/hero_in-->
            <div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">
                    @foreach($blogs as $blog)
					<article class="blog wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
						<div class="row no-gutters">
							<div class="col-lg-7">
								<figure>
									<a href="blog-post.php">
                                        <img src="{{ asset('storage/blog/large/'.$blog->thumbnail->name) }}" alt="">
										<div class="preview"><span>Read more</span></div>
									</a>
								</figure>
							</div>
							<div class="col-lg-5">
								<div class="post_info">
									<small>{{ date('d M Y',strtotime($blog->created_at)) }}</small>
									<h3>
                                        <a href="blog-post.php">
                                            {{ get_local($blog->title_en,$blog->title_fr) }}
                                        </a>
                                    </h3>
									<p>
                                        {!! substr(strip_tags(get_local($blog->article_in_en,$blog->article_in_fr)),0,320) !!}
                                    </p>
								</div>
							</div>
						</div>
					</article>
                    @endforeach

					@if(!count($blogs))
					<p class="fa-1x font-bold text-center w-100">No Blogs To Show</p>
					@endif

					<div class="nav_links">
                    {{ $blogs->links() }}
                    </div>

					<!-- /pagination -->
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<!-- /widget -->
					<x-blog-search></x-blog-search>
                    <x-recent-blog></x-recent-blog>
                    <x-category-blog></x-category-blog>
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
        </main>
</div>
@endsection