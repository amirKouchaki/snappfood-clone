<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\VenderController;
use App\Models\Category;
use App\Models\VenderType;
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

//TODO validate request params more eloquently

Route::get('/user',function () {
    return auth()->user();
})->middleware('auth:sanctum');

Route::group(['middleware'=>'auth:sanctum'],function () {
    Route::post('/logout',[AuthenticationController::class,'logout']);

});


Route::controller(AuthenticationController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/verifyRegisterWithCode','verifyRegisterWithCode');
    Route::post('/verifyRegisterWithPass','verifyRegisterWithPass');
});

Route::controller(VenderController::class)->group(function(){
    Route::get('/venders','index');
});

Route::get('/categories',function () {
    return ['categories' => Category::allCategoriesWithTheirSubCategoriesOfThatType(\request('type') ?? VenderType::first()->id)->get()];
});


