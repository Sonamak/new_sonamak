<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InfoRequest;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function index() 
    {
        return view('admin.info.index',[
            'contact' => Info::where('type','contact')->first(),
            'about' => Info::where('type','about')->first()
        ]);
    }

    public function store(InfoRequest $request) 
    {
        return Info::upsertInstance($request);
    }
}
