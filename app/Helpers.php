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