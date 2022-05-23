<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pricename;
use Illuminate\Http\Request;
use App\Models\Price;
use App\Http\Requests\PriceRequest;
use App\Models\Tour;

class PriceController extends Controller {

    public function index(Request $request)
    {
        return view('admin.price.index',[
            'prices' => Price::filter($request)->paginate(10),
        ]);
    }

    public function upsert(Price $price)
    {
        return  view('admin.price.upsert',[
            'price' => $price ?? null,
            'tours' => Tour::all()
        ]);
    }

    public function store(PriceRequest $request )
    {
        Price::upsertInstance($request);
    }

    public function bestSelling(Price $price)
    {
        $price->toggleBestSelling();
    }

    public function delete(Price $price)
    {
        return $price->deleteInstance();
    }

    public function get(Price $price)
    {
        return $price;
    }

    public function more(Request $request)
    {
        return Price::filter($request)->paginate(10);
    }


}

