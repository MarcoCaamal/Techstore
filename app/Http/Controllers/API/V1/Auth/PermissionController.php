<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\Auth\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     * Permissions are predefined in the system and cannot be modified.
     */
    public function index()
    {
        $permissions = Permission::with('roles')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'message' => 'Permissions retrieved successfully',
            'data' => [
                'permissions' => $permissions,
                'total' => $permissions->count()
            ]
        ]);
    }

    /**
     * Display the specified permission.
     */
    public function show(Permission $permission)
    {
        $permission->load('roles.users');

        return response()->json([
            'success' => true,
            'data' => [
                'permission' => $permission,
                'roles_count' => $permission->roles->count(),
                'users_with_permission' => $permission->roles->flatMap->users->unique('id')->count()
            ]
        ]);
    }

    /**
     * Get roles that have this permission
     */
    public function roles(Permission $permission)
    {
        $roles = $permission->roles()->with('users')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'permission' => [
                    'id' => $permission->id,
                    'name' => $permission->name
                ],
                'roles' => $roles,
                'roles_count' => $roles->count()
            ]
        ]);
    }
}
