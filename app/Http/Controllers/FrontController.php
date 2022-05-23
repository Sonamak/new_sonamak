<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Info;
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

    public function share(Request $request,$provider)
    {
        if ( $provider == 'facebook' ) 
            return redirect()->away(Share::page(url()->previous())->facebook()->getRawLinks());
        else if ( $provider == 'twitter' )
            return redirect()->away(Share::page(url()->previous(),$request->title)->twitter()->getRawLinks());

    }

    public function tourFilter(Request $request)
    {
        return Tour::filter($request)->with('category','gallaries')->paginate(10);
    }

    public function tourSearchExtra(Request $request)
    {
        return view('front.tour.search',[
            'tours' => Tour::filter($request)->where('destination_id',null)->paginate(10),
            'categories' => Category::where('type','tour_type')->get(),
            'banner' => Banners::where('type','search-tour')->first()
        ]);
    }

    public function discover(Request $request)
    {
        return view('front.tour.discover',[
            'tours' => Tour::filter($request)->paginate(10),
            'categories' => Category::where('type','tour_type')->get(),
            'destinations' => Destination::all(),
            'banner' => Banners::where('type','search-tour')->first()
        ]);
    }

    public function blog(Blog $blog)
    {
        return view('front.blog.index',[
            'blog' => $blog
        ]);
    }

    public function blogs(Request $request)
    {
        return view('front.blog.blogs',[
            'blogs' => Blog::filter($request)->withLanguage()->paginate(4)
        ]);
    }

    public function destinationAll()
    {
        return view('front.destination.destinations',[
            'destinations' => Destination::all()
        ]);
    }

    public function contact()
    {
        return view('front.contact.index');
    }

    public function about()
    {
        return view('front.info.about',[
            'about' => Info::where('type','about')->first()
        ]);
    }

    public function terms()
    {
        return view('front.info.terms',[
            'about' => Info::where('type','terms')->first()
        ]);
    }

    public function policy()
    {
        return view('front.info.policy',[
            'about' => Info::where('type','policy')->first()
        ]);
    }

    public function faq()
    {
        return view('front.info.faq',[
            'about' => Info::where('type','faq')->first()
        ]);
    }


}
