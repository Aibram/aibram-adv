<?php

use App\Http\Controllers\NoAuth\CategoryController;
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
    Route::get('/cat-jstree/one',[CategoryController::class,'getSingleCatList'])->name('getSingleCatList');
    Route::post('/insert-cat-jstree',[CategoryController::class,'insertCat'])->name('insertCat');
    Route::put('/update-cat-jstree',[CategoryController::class,'updateCat'])->name('updateCat');

    
});