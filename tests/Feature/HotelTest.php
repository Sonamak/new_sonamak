<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class HotelTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test  */
    public function a_hotel_can_be_stored()
    {
        $this->withExceptionHandling();

        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
        
        $response = $this->post('hotel/store',[
            'thumbnail' => $thumbnail,
            'title_en' => 'Egyptos',
            'title_fr' => 'Egypt',
            'description_en' => 'asdasda',
            'description_fr' => 'assss'
        ]);

        $response->assertStatus(200);
    }
}
