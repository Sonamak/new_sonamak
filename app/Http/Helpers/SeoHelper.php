<?php

use App\Models\Seo;

function seo_default_keywords() {

    $array_keyword   = Seo::where('seoable_type','App\Models\Setup')->pluck('value')->toArray();
    $implode_keyword = implode(',',$array_keyword); 
    return $implode_keyword;

}

function seo_keywords($model) {
    return ($model->keywords->pluck('value')->toArray()) ?  implode(',',$model->keywords->pluck('value')->toArray()) : '' ;
}