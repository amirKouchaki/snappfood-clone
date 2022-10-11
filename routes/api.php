<?php

use App\Http\Controllers\AuthenticationController;
use App\Models\Category;
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

Route::controller(\App\Http\Controllers\VenderController::class)->group(function(){
    Route::get('/venders','index');
});

Route::get('/categories',function () {
    return ['categories' => Category::with('subCategories')->where('vender_type_id',\request('type'))->get()];
});

Route::get('/subCategories/{subCategory}', static function (\App\Models\SubCategory $subCategory) {
    return $subCategory;
});
