<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tourname;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Http\Requests\TourRequest;


class TourController extends Controller {

    public function index(Request $request)
    {
        return view('admin.tour.index',[
            'tours' => Tour::filter($request)->paginate(1)
        ]);
    }

    public function upsert(Tour $tour)
    {
        return  view('admin.tour.upsert',[
            'tour' => $tour ?? null
        ]);
    }

    public function store(TourRequest $request )
    {
        return Tour::upsertInstance($request);
    }

    public function delete(Tour $tour)
    {
        return $tour->deleteInstance();
    }

    public function more(Request $request)
    {
        $more = Tour::filter($request)->with('gallaries')->paginate(1);
        return ['message' => 'sucess','payload' => $more];
    }

    public function feature(Tour $tour) 
    {
        $tour->toggleFeature();
    }
    

    public function get(Tour $tour)
    {
        return $tour;
    }

}

