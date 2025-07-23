<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Auth\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $adminUser = User::create([
            'name' => 'Admin',
            'lastname' => 'User',
            'username' => 'admin',
            'email' => 'admin@techstore.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        // Create test user
        $testUser = User::create([
            'name' => 'Test',
            'lastname' => 'User',
            'username' => 'testuser',
            'email' => 'test@techstore.com',
            'password' => Hash::make('user123'),
            'email_verified_at' => now(),
        ]);

        // Assign roles
        $adminRole = Role::where('name', 'admin')->first();
        $customerRole = Role::where('name', 'customer')->first();

        if ($adminRole) {
            $adminUser->roles()->attach($adminRole->id);
        }

        if ($customerRole) {
            $testUser->roles()->attach($customerRole->id);
        }

        $this->command->info('Admin users created and roles assigned successfully!');
    }
}
