<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'first_name' => 'Peter',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_new_users_cannot_register_with_empty_first_name()
    {
        $this->post('/register', [
            'last_name' => 'Doe',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The first name field is required.']);
    }

    public function test_new_users_cannot_register_with_empty_last_name()
    {
        $this->post('/register', [
            'first_name' => 'Peter',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The last name field is required.']);
    }

    public function test_new_users_cannot_register_with_empty_email()
    {
        $this->post('/register', [
            'first_name' => 'Peter',
            'last_name' => 'Doe',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The email field is required.']);
    }

    public function test_new_users_cannot_register_with_empty_password()
    {
        $this->post('/register', [
            'first_name' => 'Peter',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
            'password_confirmation' => 'password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The password field is required.']);
    }

    public function test_new_users_cannot_register_with_password_mismatch()
    {
        $this->post('/register', [
            'first_name' => 'Peter',
            'last_name' => 'Doe',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'wrong-password',
        ]);

        $this->assertGuest();

        $this->withViewErrors(['The password confirmation does not match.']);
    }

    public function test_new_users_cannot_register_with_empty_fields()
    {
        $this->post('/register', []);

        $this->assertGuest();

        $this->withViewErrors([
            'The first name field is required.',
            'The last name field is required.',
            'The email field is required.',
            'The password field is required.'
        ]);
    }
}
