<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdReportController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CommentReportController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ProhibitedWordsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TestimonialController;
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
        'testimonials' => TestimonialController::class,
        'ad_reports' => AdReportController::class,
        'comment_reports' => CommentReportController::class,
        
    ]);
    Route::get('/advertisements/{id}/ad_statuses', [AdvertisementController::class, 'getAdStatuses'])->name('advertisements.getAdStatuses');
    Route::get('/advertisements/{id}/ad_properties', [AdvertisementController::class, 'getAdProperties'])->name('advertisements.getAdProperties');
    Route::get('/users/{id}/favorites', [UserController::class, 'getFavorites'])->name('users.getFavorites');
    Route::get('/users/{id}/user_ratings', [UserController::class, 'getUserRatings'])->name('users.getUserRatings');
    Route::get('/users/{id}/given_ratings', [UserController::class, 'getGivenRatings'])->name('users.getGivenRatings');
    Route::get('/users/{id}/advertisements', [UserController::class, 'getAdvertisements'])->name('users.getAdvertisements');
    Route::get('/prohibited_words', [ProhibitedWordsController::class, 'index'])->name('prohibited_words.index');
    Route::post('/prohibited_words/update', [ProhibitedWordsController::class, 'updateAll'])->name('prohibited_words.updateAll');
    Route::get('/settings/{id}/save', [SettingsController::class, 'edit'])->name('settings.save');
    Route::get('/contactus/{id}/confirm', [ContactUsController::class, 'edit'])->name('contactus.confirm');
    Route::get('/home', [AdminController::class, 'dashboard'])->name('home');
    Route::name('admins.profile.')->group(function(){
        Route::get('/profile', [AdminController::class, 'showProfile'])->name('get');
        Route::post('/profile', [AdminController::class, 'profile'])->name('post');
        Route::post('/profile/change_password', [AdminController::class, 'changePassword'])->name('change_password');
    });
});
