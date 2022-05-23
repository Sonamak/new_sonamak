<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotelname;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Http\Requests\HotelRequest;
use App\Models\Price;

class HotelController extends Controller {

    public function index(Request $request)
    {
        return view('admin.hotel.index',[
            'hotels' => Hotel::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Hotel $hotel)
    {
        return  view('admin.hotel.upsert',[
            'hotel' => $hotel ?? null,
            'prices' => Price::all()
        ]);
    }

    public function more(Request $request)
    {
        return Hotel::filter($request)->with('gallaries')->paginate(10);
    }

    public function store(HotelRequest $request )
    {
        Hotel::upsertInstance($request);
    }

    public function delete(Hotel $hotel)
    {
        return $hotel->deleteInstance();
    }

    public function get(Hotel $hotel)
    {
        return $hotel;
    }

}

