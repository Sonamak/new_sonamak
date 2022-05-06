<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    public function index()
    {
        return view('admin.social.index',[
            'socials' => Social::all()
        ]);
    }

    public function create(SocialRequest $request)
    {

        return Social::createInstance($request);

    }

    public function delete(Social $social)
    {
        return $social->deleteInstance();
    }
}
