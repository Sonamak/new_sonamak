<div class="col-lg-6">
    <a class="box_news" href="{{ route('blog.front',['blog' => $blog->id]) }}">
        <figure>
            <img src="{{ asset('storage/blog/small/'.$blog->thumbnail->name) }}" alt="">
            <figcaption><strong>{{ date('d',strtotime($blog->created_at)) }}</strong>{{ date('M',strtotime($blog->created_at)) }}</figcaption>
        </figure>
        <ul>
            <li>{{ date('d M Y',strtotime($blog->created_at)) }}</li>
        </ul>
        <h4>{{ substr(strip_tags(get_local($blog->title_en,$blog->title_fr)),0,20) }}</h4>
        <p>{{ substr(strip_tags(get_local($blog->article_in_en,$blog->article_in_fr)),0,100) }}</p>
    </a>
</div>