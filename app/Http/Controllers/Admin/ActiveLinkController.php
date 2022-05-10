<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActiveLink;
use Illuminate\Http\Request;

class ActiveLinkController extends Controller
{
    public function index()
    {
        return view('admin.links.index',[
            'active' => ActiveLink::all() 
        ]);
    }

    public function toggleActive(ActiveLink $activeLink)
    {
        return $activeLink->toggleActive();
    }

    public function appearOn(Request $request,ActiveLink $activeLink) 
    {
        return $activeLink->appearOn($request);
    }
}
