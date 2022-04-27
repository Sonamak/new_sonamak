<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class LogoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Storage::fake('logo');

        $file = UploadedFile::fake()->image('logo.jpg');


        $response = $this->post('admin-panal/setup/store',[
            'logo' => $file
        ]);

        $response->assertSee('hedasdasdasdllo');

    }
}
