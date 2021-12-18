<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */ /** @test */
    public function PostStatus()
    {
        $response = $this->post('/subscribe',[
            'email'=>'',
        ]);

        $response->assertStatus(302);
    }
    /** @test */
    public function PostTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('post-media');
    }
}
