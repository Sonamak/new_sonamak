<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Postqsasdname;
use Illuminate\Http\Request;
use App\Models\Postqsasd;
use App\Http\Requests\PostqsasdRequest;


class PostqsasdController extends Controller {

    public function index(Request $request)
    {
        return view('admin.postqsasd.index',[
            'postqsasds' => Postqsasd::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Postqsasd $postqsasd)
    {
        return  view('admin.postqsasd.upsert',[
            'postqsasd' => $postqsasd ?? null
        ]);
    }

    public function store(PostqsasdRequest $request )
    {
        Postqsasd::upsertInstance($request);
    }

    public function delete(Postqsasd $postqsasd)
    {
        return $postqsasd->deleteInstance();
    }

    public function get(Postqsasd $postqsasd)
    {
        return $postqsasd;
    }

}

