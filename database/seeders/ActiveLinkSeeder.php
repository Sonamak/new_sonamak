<?php

namespace Database\Seeders;

use App\Models\ActiveLink;
use Illuminate\Database\Seeder;

class ActiveLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActiveLink::updateOrCreate(
            ['id' => 1],
            [
                'page' => 'home',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 2],
            [
                'page' => 'destinations',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 3],
            [
                'page' => 'extra',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 4],
            [
                'page' => 'about',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 5],
            [
                'page' => 'privacy',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 6],
            [
                'page' => 'faq',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 7],
            [
                'page' => 'terms',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 8],
            [
                'page' => 'discover',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 9],
            [
                'page' => 'blogs',
                'active' => false
            ]
        );
    }
}
