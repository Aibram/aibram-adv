<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group( ['middleware' => ['auth:user'] ],function(){
//     // authenticated staff routes here 
//      Route::get('dashboard',[LoginController::class, 'adminDashboard']);
// });

// Route::group(['as' => 'admin.','prefix' => 'admin'],function(){
//     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth:admin');
//     Route::resources([
//         'categories' => CategoryController::class,
//         'users' => UserController::class,
//     ]);
//     Route::get('/login',[AdminController::class, 'showLoginForm'])->name('login');
//     Route::post('/login',[AdminController::class, 'login'])->name('loginPost');
//     Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
// });
