<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['from','to','name','email','guests','nationality','telephone','requirments','tour_id'];

    static function createInstance($request)
    {
        $dateArray =  explode('>',$request->dates);

        $request->merge([
            'from' => get_valid_date($dateArray[0]),
            'to' => get_valid_date($dateArray[1]),
            'guests' => $request->qtyInput
        ]);

        $reservation = self::create(
            $request->all()
        );

        return $reservation;
    }

    //Relations 

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}
