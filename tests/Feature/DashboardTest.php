<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Auth\Role;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_access_dashboard()
    {
        $user = User::factory()->create();
        $role = Role::create([
            'name' => 'admin'
        ]);

        $user->roles()->attach($role);

        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_guest_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        // Debería redirigir al login
        $response->assertRedirect('/login');
    }

    public function test_non_admin_user_cannot_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/dashboard');

        // Debería redirigir o mostrar 403
        $this->assertTrue(
            $response->status() === 302 || $response->status() === 403
        );
    }
}
