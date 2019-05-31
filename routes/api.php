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

//Route::post('areas/store', 'AreasController@store');
Route::apiResource('areas', 'AreasController');
//Route::apiResource('areas', 'AreasController',['except'=>['create', 'edit']]);

Route::get('paises/listing','PaisesController@Listing');
Route::get('estados/listing','EstadosController@Listing');
Route::get('cidades/listing/{estado}','CidadesController@Listing');

Route::resource('paises', 'PaisesController', ['only' => ['index']]);
Route::resource('estados', 'EstadosController', ['only' => ['index']]);
Route::resource('cidades', 'CidadesController', ['only' => ['index']]);
