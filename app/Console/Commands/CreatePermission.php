<?php

namespace App\Console\Commands;

use App\Models\Auth\Permission;
use Illuminate\Console\Command;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create {name : The permission name} {--description= : Optional description}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new permission in the system (for system administrators only)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $description = $this->option('description');

        // Check if permission already exists
        if (Permission::where('name', $name)->exists()) {
            $this->error("Permission '{$name}' already exists!");
            return 1;
        }

        // Validate permission name format
        if (!preg_match('/^[a-z_]+\.[a-z_]+$/', $name)) {
            $this->error("Permission name must follow the format: 'resource.action' (e.g., 'products.create')");
            return 1;
        }

        try {
            $permission = Permission::create([
                'name' => $name,
            ]);

            $this->info("Permission '{$name}' created successfully!");

            if ($description) {
                $this->line("Description: {$description}");
            }

            $this->line("Permission ID: {$permission->id}");

            return 0;
        } catch (\Exception $e) {
            $this->error("Failed to create permission: " . $e->getMessage());
            return 1;
        }
    }
}
