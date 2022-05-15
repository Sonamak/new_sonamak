@if(count($tour->includes) || count($tour->excludes))
<hr>
<div id="inclusions">
    <div class="row">
        @if(count($tour->includes))
        <div class="col-lg-6">
            <ul class="">
                <h3>
                {{ __('main.inclusions') }}
                </h3>
                @foreach($tour->includes as $include)
                <li>
                    <i class="fa-solid fa-check"></i>
                    <span>{{ get_local($include->value_en,$include->value_fr) }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(count($tour->excludes))
        <div class="col-lg-6">
            <h3>
            {{ __('main.exclution') }}
            </h3>
            <ul class="">
                @foreach($tour->excludes as $exclude)
                <li>
                    <i class="fa-solid fa-xmark"></i>
                    <span>{{ get_local($exclude->value_en,$exclude->value_fr) }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endif