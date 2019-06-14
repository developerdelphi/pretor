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

/*** Rotas para Areas Controller */
Route::post('areas/store', 'AreasController@store');
Route::put('areas/update/{id}', 'AreasController@update');
Route::delete('areas/destroy/{id}', 'AreasController@destroy');
Route::get('areas/show/{id}', 'AreasController@show');
Route::get('areas/index', 'AreasController@index');
Route::get('areas', 'AreasController@index');

Route::get('paises/listing','PaisesController@Listing');
Route::get('estados/listing','EstadosController@Listing');
Route::get('cidades/listing/{estado}','CidadesController@Listing');

Route::resource('paises', 'PaisesController', ['only' => ['index']]);
Route::resource('estados', 'EstadosController', ['only' => ['index']]);
Route::resource('cidades', 'CidadesController', ['only' => ['index']]);
