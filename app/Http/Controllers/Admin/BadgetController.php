<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Badgetname;
use Illuminate\Http\Request;
use App\Models\Badget;
use App\Http\Requests\BadgetRequest;


class BadgetController extends Controller {

    public function index(Request $request)
    {
        return view('admin.badget.index',[
            'badgets' => Badget::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Badget $badget)
    {
        return  view('admin.badget.upsert',[
            'badget' => $badget ?? null
        ]);
    }

    public function store(BadgetRequest $request )
    {
        Badget::upsertInstance($request);
    }

    public function delete(Badget $badget)
    {
        return $badget->deleteInstance();
    }

    public function get(Badget $badget)
    {
        return $badget;
    }

}

