<?php

use Illuminate\Support\Facades\Config;

function currency_sympol()
{
    if ( app()->make('saved_cookie',['type' => 'currency']) == 'cad' ) {
        return 'CAD';
    } else if ( app()->make('saved_cookie',['type' => 'currency']) == 'eur' ) {
        return '€';
    } else {
        return '$';
    }
}

function currency_value($package)
{
    if ( app()->make('saved_cookie',['type' => 'currency']) == 'cad' ) {
        return $package->cad_price ?? 'Not Set';
    } else if ( app()->make('saved_cookie',['type' => 'currency']) == 'eur' ) {
        return $package->eur_price ?? 'Not Set';
    } else {
        return $package->usd_price;
    }
}

function get_local_string($string)
{
    return str_replace(' ','_',strtolower($string));
}

function get_local($english,$french)
{
    if(Config::get('app.locale') == 'en') {
        return $english;
    } else {
        return $french;
    }
}
