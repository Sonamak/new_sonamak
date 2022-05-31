<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Codername;
use Illuminate\Http\Request;
use App\Models\Coder;
use App\Http\Requests\CoderRequest;


class CoderController extends Controller {

    public function index(Request $request)
    {
        return view('admin.coder.index',[
            'coders' => Coder::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Coder $coder)
    {
        return  view('admin.coder.upsert',[
            'coder' => $coder ?? null
        ]);
    }

    public function store(CoderRequest $request )
    {
        Coder::upsertInstance($request);
    }

    public function delete(Coder $coder)
    {
        return $coder->deleteInstance();
    }

    public function get(Coder $coder)
    {
        return $coder;
    }

}

