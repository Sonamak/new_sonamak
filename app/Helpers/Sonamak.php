<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Admin\PostController;
use Illuminate\Support\Facades\Request;

class Sonamak {

    public function routes()
    {
        $routes = DB::table('routes')->get();

        foreach( $routes as $route ) {

            $name  = $route->name;
            $lowername = strtolower($name);
            $type = $route->type;

            Route::group(['prefix' => $lowername], function() use ($name,$type,$lowername) {

                $uppername = ucwords($name);
                $controller = "Admin\\".$uppername."Controller";

                Route::get("/","$controller@index")->name("$lowername.index");
                Route::post("/store","$controller@store")->name('$lowername.store');

                if ( $type == 'multi' ) {
                    Route::get("/upsert","$controller@upsert");
                }
                
            });

        }

    }
}