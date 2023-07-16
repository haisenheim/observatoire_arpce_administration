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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','namespace'=>'App\Http\Controllers\Api'], function () {
    Route::post('/login', 'UserController@login');
    Route::get('/params','HomeController@getParams');
    Route::post('/sync','ExploitantController@sync');
    Route::post('/campagne/identification/sync','ExploitantController@IdentificationSync');
});
/*
Route::group(['prefix' => 'v1','namespace'=>'Api\Agent','middleware'=>'jwt.verify'], function () {
    Route::get('/gics', 'GicController@index');
    Route::post('/gics', 'GicController@store');
    Route::get('/cooperatives', 'GicController@getCooperatives');
    Route::get('/exploitants','ExploitantController@index');
    //Route::post('/sync','ExploitantController@sync');
   });
 */
