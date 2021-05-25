<?php

use App\Http\Controllers\Website\AuthController;
use App\Http\Controllers\Website\AdvertisementController;
use App\Http\Controllers\Website\FrontendController;
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
Route::name('frontend.')->group(function(){
    Route::middleware('guest:user')->group(function(){
        Route::get('/login',[AuthController::class,'showLoginForm'])->name('login');
        Route::post('/login',[AuthController::class,'login'])->name('loginPost');
        Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register');
        Route::post('/register',[AuthController::class,'register'])->name('registerPost');
        Route::get('/check-code',[AuthController::class,'checkCodeForm'])->name('checkCode');
        Route::post('/check-code',[AuthController::class,'checkCode'])->name('checkCodePost');
        Route::get('/change-password',[AuthController::class,'reInitPasswordForm'])->name('reInitPassword');
        Route::post('/change-password',[AuthController::class,'reInitPassword'])->name('reInitPasswordPost');
        Route::get('/forget-password',[AuthController::class,'showForgetPasswordForm'])->name('forgetPassword');
        Route::post('/forget-password',[AuthController::class,'forgetPassword'])->name('forgetPasswordPost');
        Route::get('/',[FrontendController::class,'home'])->name('home');
        Route::get('/categories',[FrontendController::class,'categories'])->name('categories');
        Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
        Route::get('/about',[FrontendController::class,'about'])->name('about');
        Route::get('/ads',[AdvertisementController::class,'all'])->name('ad.all');
    });
    Route::middleware('auth:user')->group(function(){
        Route::name('ad.')->group(function(){
            Route::get('/create',[AdvertisementController::class,'create'])->name('create');
            Route::get('/ads/{slug}',[AdvertisementController::class,'one'])->name('details');
            Route::post('/create',[AdvertisementController::class,'insert'])->name('insert');
            Route::get('/update/{id}',[AdvertisementController::class,'edit'])->name('edit');
            Route::post('/update',[AdvertisementController::class,'update'])->name('update');
            Route::post('/delete/{id}',[AdvertisementController::class,'delete'])->name('delete');
        });
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('/dashboard',[FrontendController::class,'dashboard'])->name('dashboard');
    });
});