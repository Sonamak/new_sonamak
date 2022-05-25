<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postqname;
use Illuminate\Http\Request;
use App\Models\Postq;
use App\Http\Requests\PostqRequest;


class PostqController extends Controller {

    public function index(Request $request)
    {
        return view('admin.postq.index',[
            'postqs' => Postq::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Postq $postq)
    {
        return  view('admin.postq.upsert',[
            'postq' => $postq ?? null
        ]);
    }

    public function store(PostqRequest $request )
    {
        Postq::upsertInstance($request);
    }

    public function delete(Postq $postq)
    {
        return $postq->deleteInstance();
    }

    public function get(Postq $postq)
    {
        return $postq;
    }

}

