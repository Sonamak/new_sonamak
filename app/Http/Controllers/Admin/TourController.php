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
            'tours' => Tour::filter($request)->paginate(10)
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
        Tour::upsertInstance($request);
    }

    public function feature(Tour $tour)
    {
        return $tour->toggleFeature();
    }

    public function delete(Tour $tour)
    {
        return $tour->deleteInstance();
    }

    public function get(Tour $tour)
    {
        return $tour;
    }

}

