<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cookie;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function language($language)
    {
        $cookie = Cookie::language($language);
        return ($cookie) ? redirect()->back()->withCookie($cookie) : abort(404);
    }

    public function currency($currency)
    {
        $cookie = Cookie::currency($currency);
        return ($cookie) ? redirect()->back()->withCookie($cookie) : abort(404);
    }

}
