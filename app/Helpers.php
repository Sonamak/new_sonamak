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

function get_currency()
{
    if ( app()->make('saved_cookie',['type' => 'currency']) == 'cad' ) {
        return 'cad';
    } else if ( app()->make('saved_cookie',['type' => 'currency']) == 'eur' ) {
        return 'eur';
    } else {
        return 'usd';
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

function get_valid_date($date) {
    $date = explode('-',$date);
    $year = trim($date[2],' ');
    $month = trim($date[0],' ');
    $day = trim($date[1],' ');
    $validDate ="$month/$day/20$year";
    return date('Y-m-d',strtotime($validDate));
}   
