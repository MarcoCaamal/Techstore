<?php

namespace App\Console\Commands;

use App\Models\Auth\Permission;
use Illuminate\Console\Command;

class ListPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:list {--search= : Search permissions by name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all predefined permissions in the system (read-only)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $search = $this->option('search');

        $query = Permission::with('roles');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $permissions = $query->orderBy('name')->get();

        if ($permissions->isEmpty()) {
            $message = $search ? "No permissions found matching '{$search}'" : "No permissions found";
            $this->warn($message);
            return 0;
        }

        $this->info("Found " . $permissions->count() . " permission(s):");
        $this->newLine();

        $headers = ['ID', 'Permission Name', 'Roles Count', 'Created At'];
        $rows = [];

        foreach ($permissions as $permission) {
            $rows[] = [
                $permission->id,
                $permission->name,
                $permission->roles->count(),
                $permission->created_at->format('Y-m-d H:i:s')
            ];
        }

        $this->table($headers, $rows);

        return 0;
    }
}
