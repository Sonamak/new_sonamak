<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function upsertInstance($request)
    {
       foreach($request['schedule'] as $day) {
            
            self::updateOrCreate(
                ['day' => $day['day']],
                [
                    'day' => $day['day'],
                    'from' => $day['from'],
                    'to' => $day['to'],
                    'holiday' => isset($day['holiday'] ) ? true : false
                ]
            );
       }
    }
}
