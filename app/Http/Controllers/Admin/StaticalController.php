<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staticalname;
use Illuminate\Http\Request;
use App\Models\Statical;
use App\Http\Requests\StaticalRequest;


class StaticalController extends Controller {

    public function index(Request $request)
    {
        return view('admin.statical.index',[
            'staticals' => Statical::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Statical $statical)
    {
        return  view('admin.statical.upsert',[
            'statical' => $statical ?? null
        ]);
    }

    public function store(StaticalRequest $request )
    {
        Statical::upsertInstance($request);
    }

    public function delete(Statical $statical)
    {
        return $statical->deleteInstance();
    }

    public function get(Statical $statical)
    {
        return $statical;
    }

}

