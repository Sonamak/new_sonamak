<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postqsname;
use Illuminate\Http\Request;
use App\Models\Postqs;
use App\Http\Requests\PostqsRequest;


class PostqsController extends Controller {

    public function index(Request $request)
    {
        return view('admin.postqs.index',[
            'postqss' => Postqs::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Postqs $postqs)
    {
        return  view('admin.postqs.upsert',[
            'postqs' => $postqs ?? null
        ]);
    }

    public function store(PostqsRequest $request )
    {
        Postqs::upsertInstance($request);
    }

    public function delete(Postqs $postqs)
    {
        return $postqs->deleteInstance();
    }

    public function get(Postqs $postqs)
    {
        return $postqs;
    }

}

