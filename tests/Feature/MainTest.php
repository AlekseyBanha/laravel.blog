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
        $post = \App\Models\Post::factory()->create();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee($post->title);
    }


    /** @test */
    //Ability to view a single post
    public function PostSingle()
    {
        $post = \App\Models\Post::factory()->create();

        $response = $this->get('/article/' . $post->slug);

        $response->assertStatus(200);

        $response->assertSee($post->title);

    }
    /** @test */
    //Ability to view a category
    public function CategorySee()
    {
        $category = \App\Models\Category::factory()->create();

        $response = $this->get('/category/' . $category->slug);

        $response->assertStatus(200);

        $response->assertSee($category->title);

    }
    /** @test */
    //Ability to view a tag
    public function TagSee()
    {
        $tag = \App\Models\Tag::factory()->create();

        $response = $this->get('/tag/' . $tag->slug);

        $response->assertStatus(200);

        $response->assertSee($tag->title);

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
        $user = \App\Models\User::factory()->create();

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
        $post = \App\Models\Post::factory()->create();

        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/article/' . $post->slug);

        $response->assertStatus(200);

        $response = $this->post('/mailsend', [
            'slug' => $post->slug
        ]);

        $response->assertRedirect('/article/' . $post->slug);

        $response->assertStatus(302);

        $response->assertSessionHasNoErrors();
    }

}
