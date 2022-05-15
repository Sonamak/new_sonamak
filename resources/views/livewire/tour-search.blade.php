<div class="collapse" id="collapseMap">
    <div id="map" class="map"></div>
</div>
<!-- End Map -->
<div class="filters_listing sticky_horizontal">
    <div class="container">
        <ul class="clearfix"></ul>
    </div>
    <div class="container margin_60_35">
			<form class="ajax-form" action="{{ route('tour.filter') }}" method="post" callback="tourAppendSearch">
				<div class="col-lg-12">
					<div class="row no-gutters custom-search-input-2 inner">
						<div class="col-lg-7">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="What are you looking for..." name="name">
								<i class="icon_search"></i>
							</div>
						</div>
						<div class="col-lg-3">
							<select class="wide" name="category">
								<option   @if(!request()->category)) selected @endif class="m-0">
									All Categories
								</option>
								@foreach($categories as $category)
								<option class="{{ get_local($category->name_en,$category->name_fr) }}" value="{{ $category->id }}" @if(request()->category == get_local($category->name_en,$category->name_fr)) selected @endif>
								{{ get_local($category->name_en,$category->name_fr) }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="col-lg-2">
							<input type="submit" class="btn_search" value="Search">
						</div>
					</div>
					<!-- /row -->
				</div>
			</form>
			<!-- /custom-search-input-2 -->
			
			<div class="isotope-wrapper">
			<div class="row main_search_container">
				@foreach($tours as $tour)
                <div class="col-xl-4 col-lg-6 col-md-6 isotope-item popular">
                    <x-tour-slider-box :tour="$tour"></x-tour-slider-box>
				</div>
                @endforeach
			</div>
			<!-- /row -->
			</div>
			<!-- /isotope-wrapper -->
			
			<p class="text-center" wire:click="loadMore"><a href="#0" class="btn_1 rounded add_top_30" >Load more</a></p>
			
		</div>
    <!-- /container -->
</div>