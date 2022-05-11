<?php

namespace Tests\Feature;

use App\Models\User;
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
        $user = User::find(1);
        
        $response = $this->actingAs($user)->post('admin-panal/hotel/store',[
            'thumbnail' => $thumbnail,
            'title_en' => 'Egyptos',
            'title_fr' => 'Egypt',
            'price_id' => 1,
            'description_en' => 'asdasda',
            'description_fr' => 'assss'
        ]);

        $response->assertOk();
    }
}
