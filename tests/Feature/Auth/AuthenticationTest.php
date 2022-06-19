<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['These credentials do not match our records.']);
    }

    public function test_users_can_not_authenticate_with_empty_email()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The email field is required.']);
    }

    public function test_users_can_not_authenticate_with_empty_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The password field is required.']);
    }

    public function test_users_can_not_authenticate_with_empty_fields()
    {
        $user = User::factory()->create();

        $this->post('/login', []);

        $this->assertGuest();

        $this->withViewErrors(['The email field is required.', 'The password field is required.']);
    }
}
