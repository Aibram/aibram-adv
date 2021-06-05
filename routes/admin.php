<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:admin')->group(function(){
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login',[LoginController::class,'login'])->name('loginPost');
});
Route::middleware('auth:admin')->group(function(){
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

    Route::resources([
        'categories' => CategoryController::class,
        'countries' => CountryController::class,
        'contactus' => ContactUsController::class,
        'cities' => CityController::class,
        'users' => UserController::class,
        'admins' => AdminController::class,
        'advertisements' => AdvertisementController::class,
        'settings' => SettingsController::class,
    ]);
    Route::get('/settings/{id}/save', [SettingsController::class, 'edit'])->name('settings.save');
    Route::get('/contactus/{id}/confirm', [ContactUsController::class, 'edit'])->name('contactus.confirm');
    Route::get('/home', [AdminController::class, 'dashboard'])->name('home');
    Route::name('admins.profile.')->group(function(){
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('get');
        Route::post('/profile', [AdminController::class, 'profile'])->name('post');
        Route::post('/profile/change_password', [AdminController::class, 'changePassword'])->name('change_password');
    });
});
