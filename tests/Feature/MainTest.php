<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MainTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    //Ability to view the main directory and display posts

    public function PostTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('Home');
    }


    /** @test */
    //Ability to view a single post
    public function PostSingle()
    {
        $response = $this->get('/article/what-is-cryptocurrency-here-s-what-you-should-know');

        $response->assertStatus(200);

        $response->assertSee('post-media');

    }
    /** @test */
    //Ability to view a category
    public function CategorySee()
    {
        $response = $this->get('/category/technologies');

        $response->assertStatus(200);

        $response->assertSee('post-media');

    }
    /** @test */
    //Ability to view a tag
    public function TagSee()
    {
        $response = $this->get('/tag/seo-service');

        $response->assertStatus(200);

        $response->assertSee('post-media');

    }
    /** @test */
    //Ability to switch to a search request
    public function CanSearch()
    {
        $response = $this->get('/search');

        $response->assertStatus(302);/* $response->assertSee('post-media')*/;

    }

    /** @test */
    //Can a user subscribe to a blog
    public function CanUserSub()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'test@test'
        ]);

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->post('/subscribe', ['email' => $user->email]);

        $response->assertStatus(302);

        $response->assertSessionHasNoErrors();
    }


    /** @test */
    //Whether a user can add a comment to a post
    public function CanUserComments()
    {
        $user = \App\Models\User::factory()->create([]);


        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->post('/commet', [
                'text' => 'test',
                'post_id' => '17',
            ]);

        $response->assertStatus(200);

        $response->assertSessionHasNoErrors();
    }

    /** @test */
    //Whether a user can share the post
    public function CanUserSharePost()
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'Stepan',
            'email' => 'user3@gmail.com']);
        $response = $this->actingAs($user)
            ->get('/article/what-is-cryptocurrency-here-s-what-you-should-know');

        $response->assertStatus(200);

        $response = $this->post('/mailsend', [
            'slug' => 'what-is-cryptocurrency-here-s-what-you-should-know'
        ]);

        $response->assertRedirect('/article/what-is-cryptocurrency-here-s-what-you-should-know');

        $response->assertStatus(302);

        $response->assertSessionHasNoErrors();
    }

}
