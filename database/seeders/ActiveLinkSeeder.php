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
                'page' => 'Destinations',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 3],
            [
                'page' => 'Extra Tours',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 4],
            [
                'page' => 'About',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 5],
            [
                'page' => 'Privacy',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 6],
            [
                'page' => 'FAQ',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 7],
            [
                'page' => 'Terms and conditions',
                'active' => false
            ]
        );

        ActiveLink::updateOrCreate(
            ['id' => 8],
            [
                'page' => 'Terms and conditions',
                'active' => false
            ]
        );
    }
}
