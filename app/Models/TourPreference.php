<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPreference extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }
}