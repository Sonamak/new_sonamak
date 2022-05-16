<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Category;
use App\Models\Destination;
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

    public function destinationTours(Destination $destination)
    {
        return view('front.destination.index',[
            'destination' => $destination
        ]);
    }

    public function share($provider)
    {
        if ( $provider == 'facebook' ) 
            return redirect()->away(Share::currentPage()->facebook()->getRawLinks());
        else if ( $provider == 'twitter' )
            return redirect()->away(Share::currentPage()->twitter()->getRawLinks());

    }

    public function tourFilter(Request $request)
    {
        return Tour::filter($request)->with('category','gallaries')->paginate(10);
    }

    public function tourSearchExtra(Request $request)
    {
        return view('front.tour.search',[
            'tours' => Tour::filter($request)->where('destination_id',null)->paginate(10),
            'categories' => Category::all(),
            'banner' => Banners::where('type','search-tour')->first()
        ]);
    }

    public function discover(Request $request)
    {
        return view('front.tour.discover',[
            'tours' => Tour::filter($request)->paginate(10),
            'categories' => Category::all(),
            'destinations' => Destination::all(),
            'banner' => Banners::where('type','search-tour')->first()
        ]);
    }

    public function destinationAll()
    {
        return view('front.destination.destinations',[
            'destinations' => Destination::all()
        ]);
    }

}
