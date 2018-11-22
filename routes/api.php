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


Route::get('/marcas',"QualitasController@getMarcas");
Route::get('/modelos/{uso}/{marca}/{modelo}',"QualitasController@getModelos");
// Route::get('/tarifas','WebServiceController@getTarifas');
Route::post('/cotizacion','ClienteController@store');
Route::post('/searchCliente','ClienteController@search');
Route::post('/getCoberturasQ','QualitasController@getCobertura');
Route::get('/generalS','GeneralSegurosController@getCoberturas');
Route::get('/getMarcas','GeneralSegurosController@getMarcas');

Route::get('/cp/{cp}','CPController@get');
