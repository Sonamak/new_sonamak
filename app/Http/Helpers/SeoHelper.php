<?php

use App\Models\Seo;

function seo_default_keywords() {

    $array_keyword   = Seo::where('seo_type','App\Models\Setup')->pluck('value')->toArray();
    $implode_keyword = implode(',',$array_keyword); 
    return $implode_keyword;

}