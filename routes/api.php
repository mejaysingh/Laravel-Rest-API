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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// use App\Person;

// Route::get('/person/{person}', function(Person $person){
//     return $person;
// });

// Route::get('/person/{person}', 'PersonController@show');

Route::prefix('v1')->group(function(){
    Route::apiResource('/person', 'Api\v1\PersonController')
        ->only(['show','destroy','update','store']);

    Route::apiResource('/people', 'Api\v1\PersonController')
        ->only(['index']);
});

Route::prefix('v2')->group(function(){
    Route::apiResource('/person', 'Api\v2\PersonController')
        ->only(['show']);

});

Route::prefix('v3')->group(function(){
    Route::apiResource('/person', 'Api\v3\PersonController')
        ->only(['show','destroy','update','store']);

    Route::apiResource('/people', 'Api\v3\PersonController')
        ->only(['index']);

});