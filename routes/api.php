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

/** Rotas para Atributos de Qualificação */
Route::get('attributes', 'AttributesController@index');
Route::get('attributes/index', 'AttributesController@index');
Route::get('attributes/show/{id}', 'AttributesController@show');
Route::put('attributes/update/{id}', 'AttributesController@update');
Route::post('attributes/store', 'AttributesController@store');
Route::delete('attributes/destroy/{id}', 'AttributesController@destroy');
/** Rotas para Pessoas */
Route::get('personas', 'PersonasController@index');
Route::get('personas/index', 'PersonasController@index');
Route::get('personas/show/{id}', 'PersonasController@show');
Route::put('personas/update/{id}', 'PersonasController@update');
Route::post('personas/store', 'PersonasController@store');
Route::delete('personas/destroy/{id}', 'PersonasController@destroy');

/** Rotas para Processos */
Route::get('processes', 'ProcessesController@index');
Route::get('processes/index', 'ProcessesController@index');
Route::get('processes/show/{id}', 'ProcessesController@show');
Route::put('processes/update/{id}', 'ProcessesController@update');
Route::post('processes/store', 'ProcessesController@store');
Route::delete('processes/destroy/{id}', 'ProcessesController@destroy');

/** Rotas para Entidades */
Route::get('entities', 'EntitiesController@index');
Route::get('entities/index', 'EntitiesController@index');
Route::get('entities/show/{id}', 'EntitiesController@show');
Route::get('entities/search/{name}', 'EntitiesController@search');
Route::get('entities/listing/{id}', 'EntitiesController@listing');
Route::put('entities/update/{id}', 'EntitiesController@update');
Route::post('entities/store', 'EntitiesController@store');
Route::delete('entities/destroy/{id}', 'EntitiesController@destroy');

/** Rotas para Tipos de Processos - Kinds */
Route::get('kinds', 'KindsController@index');
Route::get('kinds/show/{id}', 'KindsController@show');
Route::get('kinds/listing/{id}', 'KindsController@listing');
Route::put('kinds/update/{id}', 'KindsController@update');
Route::post('kinds/store', 'KindsController@store');
Route::delete('kinds/destroy/{id}', 'KindsController@destroy');


/*** Rotas para Areas Controller */
Route::get('areas', 'AreasController@index');
Route::get('areas/index', 'AreasController@index');
Route::get('areas/show/{id}', 'AreasController@show');
Route::get('areas/listing/{id}', 'AreasController@listing');
Route::put('areas/update/{id}', 'AreasController@update');
Route::post('areas/store', 'AreasController@store');
Route::delete('areas/destroy/{id}', 'AreasController@destroy');

Route::get('paises/listing', 'PaisesController@Listing');
Route::get('estados/listing', 'EstadosController@Listing');
Route::get('cidades/listing/{estado}', 'CidadesController@Listing');

Route::resource('paises', 'PaisesController', ['only' => ['index']]);
Route::resource('estados', 'EstadosController', ['only' => ['index']]);
Route::resource('cidades', 'CidadesController', ['only' => ['index']]);
