<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogname;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Models\Category;

class BlogController extends Controller {

    public function index(Request $request)
    {
        return view('admin.blog.index',[
            'blogs' => Blog::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Blog $blog)
    {
        return  view('admin.blog.upsert',[
            'blog' => $blog ?? null,
            'categories' => Category::where('type','blog_type')->get()
        ]);
    }

    public function store(BlogRequest $request )
    {
        Blog::upsertInstance($request);
    }

    public function delete(Blog $blog)
    {
        return $blog->deleteInstance();
    }

    public function get(Blog $blog)
    {
        return $blog;
    }

    public function more(Request $request)
    {
        return Blog::filter($request)->with('gallaries')->paginate(10);
    }

}

