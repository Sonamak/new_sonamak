<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    
    public function index()
    {
        return view('admin.banners.index');
    }


    public function store(BannerRequest $request)
    {
        dd($request);
        return Banners::storeBanner($request);
    }

}
