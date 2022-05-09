<?php

namespace App\Models;

use App\Http\Model\SonamakModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie as FacadesCookie;

class Cookie extends Model
{
    use HasFactory;

    static function language($language)
    {
        if ( in_array($language,['en','fr'])) {
            return FacadesCookie::make('language',$language,20000);
        }

        
    }

    static function currency($currency)
    {
        if (in_array($currency,['dollor','cad','eur']) ) {
            return FacadesCookie::make('currency',$currency,20000);
        }
    }
}
