<div class="item">
    <div class="box_grid">
        <figure>
            <a href="#0" class="wish_bt"></a>
            <a href="tour-details.php">
                <img src="{{ asset('storage/tour/small/'.$tour->thumbnail->name) }}" class="img-fluid" alt="" width="800" height="533">
                <div class="read_more">
                    <span>Read more</span>
                </div>
            </a>
            <small>
                @if($tour->category)

                    @if(Config::get('app.locale') == 'en')
                    {{ $tour->category->name_en }}
                    @else
                    {{ $tour->category->name_fr }}
                    @endif

                @endif
            </small>
        </figure>
        <div class="wrapper">
            <h3>
                <a href="tour-details.php">
                    @if(Config::get('app.locale') == 'en')
                    {{ $tour->title_en }}
                    @else 
                    {{ $tour->title_fr }}
                    @endif
                </a>
            </h3>
            <p>
                @if(Config::get('app.locale') == 'en')
                {{ substr(strip_tags($tour->description_en),0,200).'...'; }}
                @else 
                {{ substr(strip_tags($tour->description_fr),0,200).'...'; }}
                @endif
            </p>
            <span class="price">From <strong>$54</strong> /per person</span>
        </div>
        <ul class="d-flex">
            <li><i class="icon_clock_alt"></i> 1h 30min</li>
        </ul>
    </div>
</div>