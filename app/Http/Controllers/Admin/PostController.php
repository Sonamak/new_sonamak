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
        dd($request->all());
        return view('admin.post.index',[
            'posts' => Post::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Post $post)
    {
        dd('here');
        return  view('admin.modlower.upsert',[
            'post' => $post ?? null
        ]);
    }

    public function store(PostRequest $request )
    {
        Post::upsertInstance($request);
    }

    public function delete(Post $post)
    {
        $post->deleteInstance();
    }

    public function get(Post $post)
    {
        return $post;
    }

}

