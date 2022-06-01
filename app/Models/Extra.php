<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;

    protected $fillable = ['value','title','type','info_id'];

    public function infos()
    {
        return $this->belongsTo(Extra::class);
    }
}
