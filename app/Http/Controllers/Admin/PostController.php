<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postname;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller {

    public function index(Request $request)
    {
        return view('admin.post.index',[
            'posts' => Post::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Post $post)
    {
        return  view('admin.post.upsert',[
            'post' => $post ?? null
        ]);
    }

    public function store(PostRequest $request )
    {
        Post::upsertInstance($request);
    }

    public function delete(Post $post)
    {
        return $post->deleteInstance();
    }

    public function get(Post $post)
    {
        return $post;
    }

}

