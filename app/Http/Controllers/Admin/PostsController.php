<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postsname;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Http\Requests\PostsRequest;


class PostsController extends Controller {

    public function index(Request $request)
    {
        return view('admin.posts.index',[
            'postss' => Posts::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Posts $posts)
    {
        return  view('admin.posts.upsert',[
            'posts' => $posts ?? null
        ]);
    }

    public function store(PostsRequest $request )
    {
        Posts::upsertInstance($request);
    }

    public function delete(Posts $posts)
    {
        return $posts->deleteInstance();
    }

    public function get(Posts $posts)
    {
        return $posts;
    }

}

