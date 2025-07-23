<?php

namespace Tests\Feature;

use App\Models\Auth\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class SimpleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_user()
    {
        $user = User::create([
            'name' => 'Test',
            'lastname' => 'User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com'
        ]);
    }

    /** @test */
    public function login_page_loads()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
        $response->assertSee('Iniciar Sesión');
    }

    /** @test */
    public function register_page_loads()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
        $response->assertSee('Crear Cuenta');
    }

    /** @test */
    public function guest_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function admin_user_can_access_dashboard()
    {
        $admin = User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'username' => 'adminuser',
            'email' => 'admin@test.com',
            'password' => bcrypt('password')
        ]);

        Role::create(['name' => 'admin']); // Ensure admin role exists
        $adminRole = Role::where('name', 'admin')->first();

        $admin->roles()->attach($adminRole->id);

        $response = $this->actingAs($admin)->get('/dashboard');

        $response->assertStatus(200);
    }
}
