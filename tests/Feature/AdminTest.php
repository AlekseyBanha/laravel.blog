<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    //The ability of the administrator to see the main page
    public function AdminMainPage()
    {
        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);
        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin');

        $response->assertStatus(200);

        $response->assertSee('Home');

    }

    /** @test */
    //The administrator ability to add a new category
    public function AdminAddCat()
    {
        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin/categories/create');

        $response->assertStatus(200);

        $response->assertSee('Create category');

        $response = $this->post('admin/categories', [
            'title' => 'exampleCategory',
            'redirect' => '"/admin/categories/"',

        ]);
        $response->assertRedirect();

        $response = $this->get('/admin/categories');

        $response->assertSee('exampleCategory');


        /*        $cat = \App\Models\Category::factory()->create();*/

    }
    /** @test */
    //Ability to delete a category by admin
    public function AdminDelCat()
    {

        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $category = \App\Models\Category::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin/categories');

        $response->assertStatus(200)
            ->assertSee($category->title);

        $this->delete('admin/categories/' . $category->id);

        $response = $this->get('/admin/categories');

        $response->assertOk();

        $response->assertDontSee($category->title);
    }

    /** @test */
    //The administrator ability to add a new tag
    public function AdminAddTag()
    {
        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin/tag/create');

        $response->assertStatus(200);

        $response->assertSee('Create tag');

        $response = $this->post('admin/tag/', [
            'title' => 'SEO',
            'redirect' => '"/admin/tag/"',

        ]);
        $response->assertRedirect();

        $response = $this->get('/admin/tag');

        $response->assertSee('SEO');


    }
    /** @test */
    //Ability to delete a tag by admin
    public function AdminDelTag()
    {

        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $tag = \App\Models\Tag::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin/tag');

        $response->assertStatus(200)
            ->assertSee($tag->title);

        $this->delete('admin/tag/' . $tag->id);

        $response = $this->get('/admin/tag');

        $response->assertOk();

        $response->assertDontSee($tag->title);
    }

    /** @test */
    //The administrator ability to add a new post
    public function AdminAddPost()
    {
        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $response = $this->actingAs($user)
            ->get('/admin/posts/create');

        $response->assertStatus(200);

        $response->assertSee('Create post');

        $response = $this->post('admin/posts/', [
            'title' => 'exampl',
            'description' => 'exampl',
            'content' => 'exampl',
            'category_id' => '1',
        ]);

        $response->assertStatus(302);
    }
    /** @test */
    //Ability to delete a post by admin
    public function AdminDelPost()
    {

        $user = \App\Models\User::factory()->create([
            'is_admin' => '1',
        ]);

        $post = \App\Models\Post::factory()->create();

        $response = $this->actingAs($user)
            ->withSession(['success' => 'Login'])
            ->get('/admin/posts');

        $response->assertStatus(200)
            ->assertSee($post->title);

        $this->delete('admin/posts/' . $post->id);

        $response = $this->get('/admin/posts');

        $response->assertOk();

        $response->assertDontSee($post->title);
    }


}
