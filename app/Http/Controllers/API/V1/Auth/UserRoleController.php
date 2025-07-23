<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Models\User;
use App\Models\Auth\Role;
use App\Models\Auth\Permission;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class UserRoleController extends Controller
{
    /**
     * Get user's roles and permissions
     */
    public function getUserRoles(User $user)
    {
        $user->load(['roles.permissions']);

        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'roles' => $user->roles,
                'permissions' => $user->getAllPermissions()
            ]
        ]);
    }

    /**
     * Assign roles to user
     */
    public function assignRoles(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->roles()->sync($request->roles);
        $user->load(['roles.permissions']);

        return response()->json([
            'success' => true,
            'message' => 'Roles assigned successfully',
            'data' => [
                'user' => $user,
                'roles' => $user->roles,
                'permissions' => $user->getAllPermissions()
            ]
        ]);
    }

    /**
     * Remove roles from user
     */
    public function removeRoles(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $user->roles()->detach($request->roles);
        $user->load(['roles.permissions']);

        return response()->json([
            'success' => true,
            'message' => 'Roles removed successfully',
            'data' => [
                'user' => $user,
                'roles' => $user->roles,
                'permissions' => $user->getAllPermissions()
            ]
        ]);
    }

    /**
     * Check if user has specific permission
     */
    public function checkPermission(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'permission' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $hasPermission = $user->hasPermission($request->permission);

        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $user->id,
                'permission' => $request->permission,
                'has_permission' => $hasPermission
            ]
        ]);
    }

    /**
     * Check if user has specific role
     */
    public function checkRole(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $hasRole = $user->hasRole($request->role);

        return response()->json([
            'success' => true,
            'data' => [
                'user_id' => $user->id,
                'role' => $request->role,
                'has_role' => $hasRole
            ]
        ]);
    }

    /**
     * Get all users with their roles
     */
    public function index()
    {
        $users = User::with(['roles.permissions'])->get();

        return response()->json([
            'success' => true,
            'data' => [
                'users' => $users
            ]
        ]);
    }
}
