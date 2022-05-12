<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Share;
class FrontController extends Controller
{
    public function home()
    {
        return view('front.home');
    }

    public function tour(Tour $tour)
    {
        return view('front.tour.index',[
            'tour' => $tour
        ]);
    }

    public function share($provider)
    {
        if ( $provider == 'facebook' ) 
            return redirect()->away(Share::currentPage()->facebook()->getRawLinks());
        else if ( $provider == 'twitter' )
            return redirect()->away(Share::currentPage()->twitter()->getRawLinks());

    }

}
