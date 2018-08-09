<?php

use Illuminate\Http\Request;

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

Route::middleware([\Barryvdh\Cors\HandleCors::class])->get('/cat', 'Api\ApiController@category');
Route::middleware([\Barryvdh\Cors\HandleCors::class])->get('/list/{cat_id}', 'Api\ApiController@index');
Route::middleware([\Barryvdh\Cors\HandleCors::class])->get('/detail/{demo_id}', 'Api\ApiController@detail');