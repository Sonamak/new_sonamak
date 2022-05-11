<?php

namespace Tests\Feature;

use App\Models\User;
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

        $user = User::find(1);
        
        $response = $this->actingAs($user)->post('admin-panal/destination/store',[
            'thumbnail' => $thumbnail,
            'country_name_fr' => 'Egyptos',
            'country_name_en' => 'Egypt',
            'caption_in_en' => 'asdasda',
            'caption_in_fr' => 'assss'
        ]);

        $response->assertOk();
    }
}
