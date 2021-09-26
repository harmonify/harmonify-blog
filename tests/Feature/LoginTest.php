<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->userData = array_merge($this->user->toArray(), ['password' => 'password']);
    }

    /**
     * Reset the migrations
     */
    public function tearDown(): void
    {
        User::destroy($this->user['id']);
    }

    public function test_guest_can_access_login_page()
    {
        return $this->get('/login')->assertStatus(200);
    }

    public function test_guest_can_login()
    {
        $response = $this->post('/login', $this->userData);

        return $this->assertAuthenticated();
    }

    public function test_auth_cannot_access_login_page()
    {
        return $this->actingAs($this->user)->get('/login')->assertRedirect('/');
    }
    
    public function test_auth_can_logout()
    {
        $response = $this->actingAs($this->user)->post('/logout');

        return $this->assertGuest();
    }
}
