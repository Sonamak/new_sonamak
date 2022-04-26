<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destinationname;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Http\Requests\DestinationRequest;


class DestinationController extends Controller {

    public function index(Request $request)
    {
        return view('admin.destination.index',[
            'destinations' => Destination::filter($request)->paginate(10)
        ]);
    }

    public function upsert(Destination $destination)
    {
        return  view('admin.destination.upsert',[
            'destination' => $destination ?? null
        ]);
    }

    public function store(DestinationRequest $request )
    {
        return Destination::upsertInstance($request);
    }

    public function delete(Destination $destination)
    {
        return $destination->deleteInstance();
    }

    public function get(Destination $destination)
    {
        return $destination;
    }

    public function popular(Destination $destination)
    {
        return $destination->togglePopular();
    }

}

