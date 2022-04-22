<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        $post = $this->post('post/store',[
            'id' => 3,
            'body' => 'hello'
        ]);


        $this->assertDatabaseHas('posts', [
            'body' => 'hello'
        ]);
    }
}
