<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InquiryRequest;
use App\Models\Inquirty;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        return view('admin.inquirty.index',[
            'inquirties' => Inquirty::paginate(5)
        ]);
    }

    public function create(InquiryRequest $request)
    {
        return Inquirty::createInstance($request);
    }
}
