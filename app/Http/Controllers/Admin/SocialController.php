<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialname;
use Illuminate\Http\Request;
use App\Models\Social;
use App\Http\Requests\SocialRequest;


class SocialController extends Controller {

    public function index(Request $request)
    {
        return view('admin.social.index',[
            'socials' => Social::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Social $social)
    {
        return  view('admin.social.upsert',[
            'social' => $social ?? null
        ]);
    }

    public function store(SocialRequest $request )
    {
        Social::upsertInstance($request);
    }

    public function delete(Social $social)
    {
        return $social->deleteInstance();
    }

    public function get(Social $social)
    {
        return $social;
    }

}

