<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::name('admin.')->group(function(){
    Route::get('admin/login',[LoginController::class, 'login'])->name('login');
    Route::post('admin/do-login',[LoginController::class, 'dologin'])->name('dologin');
    Route::post('admin/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
});


