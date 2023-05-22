<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// --- Authentication ---
Route::get('admin/', [AuthController::class, 'index']);
Route::post('admin/', [AuthController::class, 'login']);
Route::get('admin/logout', [AuthController::class, 'logout']);
// --- Dashboard manage ---
Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
Route::get('admin/admin/list', [DashboardController::class, 'admin']);
Route::get('admin/products/list', [DashboardController::class, 'products']);
Route::get('admin/users/list', [DashboardController::class, 'users']);

// --- Admin Route ---
Route::get('admin/admin/list', [AdminController::class, 'add']);
Route::post('admin/admin/add', [AdminController::class, 'insert_admin']);
Route::get('admin/admin/delete_admin/{slug}', [AdminController::class, 'deleteAdmin']);