<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test  */
    public function a_blog_can_be_stored()
    {
        $this->withExceptionHandling();

        $thumbnail = UploadedFile::fake()->image('thumbnail.jpg');
        $user = User::find(1);
        
        $response = $this->actingAs($user)->post('admin-panal/blog/store',[
            'thumbnail' => $thumbnail,
            'article_in_fr' => 'article_in_fr',
            'article_in_en' => 'article_in_en',
            'language' => 'mixed',
        ]);

        $response->assertStatus(200);
    }
}
