<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;



Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);





/*Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
});
*/

Route::group(['middleware' => 'admin'], function () {
   
   Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
   Route::get('admin/admin/list', [AdminController::class, 'list']);
   Route::get('admin/admin/add', [AdminController::class, 'add']);
   Route::post('admin/admin/add', [AdminController::class, 'insert']);
   Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
   Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
   Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
   
    
});

Route::group(['middleware' => 'teacher'], function () {

Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::group(['middleware' => 'student'], function () {

Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    
});

Route::group(['middleware' => 'parent'], function () {

Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
   
});