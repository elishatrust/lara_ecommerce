<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\ProductController as ProductFront;
use Illuminate\Support\Facades\Route;




Route::group(['middleware' => 'admin'], function(){

    ## Authentication
    Route::get('admin/', [AuthController::class, 'index'])->name('admin');
    Route::post('admin/', [AuthController::class, 'login'])->name('login');
    Route::get('admin/logout', [AuthController::class, 'logout']);

    ## Profile
    Route::get('admin/user/profile', [AuthController::class, 'userProfile']);
    Route::post('admin/user/update-profile/{id}', [AuthController::class, 'updateProfile']);
    Route::post('admin/user/update-password/{id}', [AuthController::class, 'updatePassword']);

    ## Admin
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'save']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    ## Category
    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class, 'save']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

    ## Sub_Category
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class, 'save']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);
    Route::post('admin/get_subCategory',[SubCategoryController::class, 'getSubCategory']);

    ## Brands
    Route::get('admin/brand/list', [BrandController::class, 'list']);
    Route::get('admin/brand/add', [BrandController::class, 'add']);
    Route::post('admin/brand/add', [BrandController::class, 'save']);
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('admin/brand/edit/{id}', [BrandController::class, 'update']);
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);

    ## Products
    Route::get('admin/product/list', [ProductController::class, 'list']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'save']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/delete_image/{id}', [ProductController::class, 'delete_image']);
    Route::post('admin/product/image_sortable', [ProductController::class, 'image_sortable']);


    ## Colors
    Route::get('admin/color/list', [ColorController::class, 'list']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::post('admin/color/add', [ColorController::class, 'save']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class, 'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);

    ## Users
    Route::get('admin/users/list', [UserController::class, 'list']);


});


## Frontend Routes
Route::get('/', [FrontController::class, 'index']);
Route::get('about', [FrontController::class,'about']);
Route::get('contact', [FrontController::class,'contact']);
Route::get('blog', [FrontController::class,'blog']);
Route::post('filter_product', [ProductFront::class,'filterProduct']);
Route::get('{slug?}/{subslug?}', [ProductFront::class,'getCategory']);
