<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    public function test_guest_can_register()

    {   $client = \App\Models\User::factory()->create();

        $response = $this->get('/register');

        $response->assertStatus(200);

        $response = $this->post('/register',[
            'name'=>'Test',
            'email'=>'test@mail.com',
            'password'=>'123456',
            'password_confirmation'=>'123456',
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticated();

    }
    /** @test */
    public function test_guest_can_log_in()
    {
        $client = \App\Models\User::factory()->create();

        $response = $this->get('/login');

        $response->assertStatus(200);

        $response=$this->post('/login',[
            'email'=>$client->email,
            'password'=>$client->password,
        ]);
        $response->assertStatus(302);



    }

}
