<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/category','Api\CategoryController');

Route::apiResource('/food','Api\FoodController');

Route::post('/setbmi','Api\CaloriesController@storeBmi');
Route::get('/getbmi','Api\CaloriesController@getBmiResult');
Route::post('/setbmr','Api\CaloriesController@storeBmr');
Route::get('/getbmr','Api\CaloriesController@getBmrResult');
Route::post('/setwaterIntake','Api\CaloriesController@storeWaterIntake');
Route::get('/getwaterIntake','Api\CaloriesController@getwaterIntake');
Route::get('/filterByCategory','Api\FoodController@filterbyCategory');
Route::get('/searchByName','Api\FoodController@searchByName');

 Route::apiResource('/fitnessUrl','Api\FitnessUrlController');