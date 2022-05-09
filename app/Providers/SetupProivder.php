<?php

namespace App\Providers;

use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;

class SetupProivder extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */

    public $type;

    public function __construct($type)
    {
        $this->type = $type;
    }
    public function register()
    {
       
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind('setup',function ($app,$params)  {
            if (  Setup::getSetting($params['type']) )            
                 return Setup::getSetting($params['type']);
            else 
                return [0 => null];
        });

        app()->bind('saved_cookie',function ($app,$params) {
            return Cookie::get($params['type']);
        });
    }
}
