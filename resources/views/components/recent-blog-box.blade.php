<li>
    <div class="alignleft">
        <a href="{{ route('blog.front',['blog' => $blog->id]) }}"><img src="{{ asset('storage/blog/small/'.$blog->thumbnail->name) }}" alt=""></a>
    </div>
    <small>{{ date('d M Y',strtotime($blog->created_at)) }}</small>
    <h3><a href="{{ route('blog.front',['blog' => $blog->id]) }}" title="">{{ get_local($blog->title_en,$blog->title_fr) }}</a></h3>
</li>