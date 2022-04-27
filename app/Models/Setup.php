<?php

namespace App\Models;

use App\Http\Services\ImageService;
use App\Http\Services\ValidationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    use HasFactory,ValidationService,ImageService;

    protected $route = 'storage/setup';

    static function storeSetup ( $request )  
    {

        return 'hell';

    }
    
}
