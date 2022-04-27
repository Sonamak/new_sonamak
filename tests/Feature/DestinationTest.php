<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class DestinationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test  */
    public function a_destination_can_be_stored()
    {
        $this->withExceptionHandling();

        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
        
        $response = $this->post('destination/store',[
            'thumbnail' => $thumbnail,
            'country_name_fr' => 'Egyptos',
            'country_name_en' => 'Egypt',
            'caption_in_en' => 'asdasda',
            'caption_in_fr' => 'assss'
        ]);

        $response->assertStatus(200);
    }
}
