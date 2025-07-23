<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Iniciar Sesión');
    }

    public function test_register_page_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSee('Crear Cuenta');
    }

    public function test_user_can_authenticate_with_valid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'name' => 'Test User',
            'lastname' => 'User',
            'username' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'login' => 'test@example.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/');
    }

    public function test_user_cannot_authenticate_with_invalid_credentials()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'name' => 'Test User',
            'lastname' => 'User',
            'username' => 'testuser',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'login' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }
}
