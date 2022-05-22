<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view('admin.reservation.index',[
            'reservations' => Reservation::paginate(5)
        ]);
    }
    public function create(ReservationRequest $request)
    {
        Reservation::createInstance($request);
    }
}
