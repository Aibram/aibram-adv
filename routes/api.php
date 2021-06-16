<?php

use App\Http\Controllers\Api\Auth\UserController;
use App\Http\Controllers\Api\Common\AuthController;
use App\Http\Controllers\Api\Common\CategoryController as CommonCategoryController;
use App\Http\Controllers\Api\Common\CityController;
use App\Http\Controllers\Api\Common\CountryController;
use App\Http\Controllers\NoAuth\CategoryController;
use App\Http\Controllers\NoAuth\AdvertisementController;
use App\Http\Controllers\NoAuth\ChatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group( ['middleware' => ['auth:user-api','scopes:user'] ],function(){
//     // authenticated staff routes here 
//      Route::get('dashboard',[LoginController::class, 'adminDashboard']);
// });

Route::group( ['name' => 'ajax.','prefix'=>'ajax'],function(){
    Route::get('/cat-jstree',[CategoryController::class,'getCatList'])->name('catList');
    Route::post('/getAds',[AdvertisementController::class,'getAds'])->name('getAds');
    Route::post('/getMessages/{id}',[ChatController::class,'getMessages'])->name('getMessages');
    Route::post('/sendMessage/{id}',[ChatController::class,'sendMessage'])->name('sendMessage');
    Route::post('/readMessages/{id}',[ChatController::class,'readMessages'])->name('readMessages');
    Route::post('/addtoFavorite',[AdvertisementController::class,'addtoFavorite'])->name('addtoFavorite');
    Route::post('/removeFromFavorite',[AdvertisementController::class,'removeFromFavorite'])->name('removeFromFavorite');
    Route::get('/cat-jstree/one',[CategoryController::class,'getSingleCatList'])->name('getSingleCatList');
    Route::post('/insert-cat-jstree',[CategoryController::class,'insertCat'])->name('insertCat');
    Route::put('/update-cat-jstree',[CategoryController::class,'updateCat'])->name('updateCat');
    Route::delete('/delete-cat-jstree',[CategoryController::class,'deleteCat'])->name('deleteCat');
});

Route::group(['prefix' => 'common'], function () {
    Route::get('countries', [CountryController::class,'index']);
    Route::get('countries/{id} ', [CountryController::class,'view']);
    Route::get('cities', [CityController::class,'index']);
    Route::get('cities/{id} ', [CityController::class,'view']);
    Route::get('categories', [CommonCategoryController::class,'index']);
    Route::get('categories/{id} ', [CommonCategoryController::class,'view']);
    Route::post('login', [AuthController::class,'login']);
    Route::post('register', [AuthController::class,'register']);
    Route::post('resend_code', [AuthController::class,'resendCode']);
    Route::post('verify_code', [AuthController::class,'verifyCode']);
    Route::post('forget_password', [AuthController::class,'forgetPassword']);
    Route::get('get_user', [AuthController::class,'getUserByProperty']);
    Route::group(['middleware'=>['auth:user-api','scope:user-api']],function () {
        Route::get('curr_user', [UserController::class,'currentUser']);
        Route::post('reset_password', [UserController::class,'resetPassword']);
        Route::post('update_profile', [UserController::class,'updateProfile']);
    });
});