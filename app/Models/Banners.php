<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use App\Http\Services\ImageService;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory,ImageService,ValidationService;
    


}
