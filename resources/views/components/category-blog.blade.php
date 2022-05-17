<div class="widget">
<div class="widget-title">
    <h4>Blog Categories</h4>
</div>
<ul class="cats">
    @foreach($categories as $category)
    <li>
        <a href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }} ">
            {{ get_local($category->name_en,$category->name_fr) }} 
            <span>({{$category->blogs_count}})</span>
        </a>
    </li>
    @endforeach
</ul>
</div>