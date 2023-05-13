<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/', [AuthController::class, 'index']);
Route::post('admin/', [AuthController::class, 'login']);
Route::get('admin/logout', [AuthController::class, 'logout']);

Route::get('admin/dashboard', function() {
    return view('admin.dashboard');
});