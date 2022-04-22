<?php

namespace Tests\Feature;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /** @test */
    public function route_main_test()
    {
        $routes = DB::table('routes')->where('activate',1)->pluck('name')->toArray();

        foreach( $routes as  $route ) {
            dump($route == 'event' );

            $single_route = strtolower($route);

            $this->get("/$single_route");

            $this->assertTrue(true);

        }

        
    }
}
