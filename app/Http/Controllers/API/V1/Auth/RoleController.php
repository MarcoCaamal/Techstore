<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\Auth\Role;
use App\Models\Auth\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index()
    {
        $roles = Role::with(['permissions', 'users'])->get();

        return response()->json([
            'success' => true,
            'data' => [
                'roles' => $roles
            ]
        ]);
    }

    /**
     * Store a newly created role.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'sometimes|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role = Role::create([
            'name' => $request->name,
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->attach($request->permissions);
        }

        $role->load(['permissions', 'users']);

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully',
            'data' => [
                'role' => $role
            ]
        ], 201);
    }

    /**
     * Display the specified role.
     */
    public function show(Role $role)
    {
        $role->load(['permissions', 'users']);

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $role
            ]
        ]);
    }

    /**
     * Update the specified role.
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'sometimes|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role->update([
            'name' => $request->name,
        ]);

        if ($request->has('permissions')) {
            $role->permissions()->sync($request->permissions);
        }

        $role->load(['permissions', 'users']);

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully',
            'data' => [
                'role' => $role
            ]
        ]);
    }

    /**
     * Remove the specified role.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully'
        ]);
    }

    /**
     * Get users that have this role
     */
    public function users(Role $role)
    {
        $users = $role->users;

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $role->name,
                'users' => $users
            ]
        ]);
    }

    /**
     * Get permissions for this role
     */
    public function permissions(Role $role)
    {
        $permissions = $role->permissions;

        return response()->json([
            'success' => true,
            'data' => [
                'role' => $role->name,
                'permissions' => $permissions
            ]
        ]);
    }

    /**
     * Assign permissions to role
     */
    public function assignPermissions(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role->permissions()->sync($request->permissions);
        $role->load('permissions');

        return response()->json([
            'success' => true,
            'message' => 'Permissions assigned successfully',
            'data' => [
                'role' => $role
            ]
        ]);
    }

    /**
     * Remove permissions from role
     */
    public function removePermissions(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role->permissions()->detach($request->permissions);
        $role->load('permissions');

        return response()->json([
            'success' => true,
            'message' => 'Permissions removed successfully',
            'data' => [
                'role' => $role
            ]
        ]);
    }

    /**
     * Assign role to users
     */
    public function assignUsers(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role->users()->sync($request->users);
        $role->load('users');

        return response()->json([
            'success' => true,
            'message' => 'Users assigned successfully',
            'data' => [
                'role' => $role
            ]
        ]);
    }

    /**
     * Remove role from users
     */
    public function removeUsers(Request $request, Role $role)
    {
        $validator = Validator::make($request->all(), [
            'users' => 'required|array',
            'users.*' => 'exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $role->users()->detach($request->users);
        $role->load('users');

        return response()->json([
            'success' => true,
            'message' => 'Users removed successfully',
            'data' => [
                'role' => $role
            ]
        ]);
    }
}
