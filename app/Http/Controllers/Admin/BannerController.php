<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function index()
    {
        return view('admin.banner.index');
    }


    public function store(Request $request)
    {
        return Banner::storeBanner($request);
    }

}