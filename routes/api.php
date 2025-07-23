<?php

use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Auth\PermissionController;
use App\Http\Controllers\API\V1\Auth\RoleController;
use App\Http\Controllers\API\V1\Auth\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes
Route::prefix('v1/auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::get('/verify-email/{id}/{hash}', [AuthController::class, 'verifyEmail'])
        ->middleware(['signed'])
        ->name('verification.verify');
});

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('v1/auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/resend-verification', [AuthController::class, 'resendVerification']);
    });

    // Permissions routes (read-only - permissions are predefined in the system)
    Route::prefix('v1/permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index']);
        Route::get('/{permission}', [PermissionController::class, 'show']);
        Route::get('/{permission}/roles', [PermissionController::class, 'roles']);
    });

    // Roles routes
    Route::prefix('v1/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::post('/', [RoleController::class, 'store']);
        Route::get('/{role}', [RoleController::class, 'show']);
        Route::put('/{role}', [RoleController::class, 'update']);
        Route::delete('/{role}', [RoleController::class, 'destroy']);
        Route::get('/{role}/users', [RoleController::class, 'users']);
        Route::get('/{role}/permissions', [RoleController::class, 'permissions']);
        Route::post('/{role}/permissions', [RoleController::class, 'assignPermissions']);
        Route::delete('/{role}/permissions', [RoleController::class, 'removePermissions']);
        Route::post('/{role}/users', [RoleController::class, 'assignUsers']);
        Route::delete('/{role}/users', [RoleController::class, 'removeUsers']);
    });

    // User roles routes
    Route::prefix('v1/users')->group(function () {
        Route::get('/', [UserRoleController::class, 'index']);
        Route::get('/{user}/roles', [UserRoleController::class, 'getUserRoles']);
        Route::post('/{user}/roles', [UserRoleController::class, 'assignRoles']);
        Route::delete('/{user}/roles', [UserRoleController::class, 'removeRoles']);
        Route::post('/{user}/check-permission', [UserRoleController::class, 'checkPermission']);
        Route::post('/{user}/check-role', [UserRoleController::class, 'checkRole']);
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
