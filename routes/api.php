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
// Route::get('/submarca/{uso}/{marca}/{submarca}/{modelo}',"QualitasController@getSubmarcas");

Route::get('/modelos/{uso}/{marca}/{modelo}',"QualitasController@getModelos");
Route::get('/tarifas','WebServiceController@getTarifas');
Route::get('/emitir','WebServiceController@emitirPoliza');
Route::post('/cotizacion','ClienteController@store');
Route::post('/searchCliente','ClienteController@search');
Route::post('/getCoberturasQ','QualitasController@getCobertura');



Route::get('/getMarcas','GeneralSegurosController@getMarcas');
Route::get('/getSubmarcas/{marca_id}','GeneralSegurosController@getSubmarcas');
Route::get('/getModelos/{submarca_id}','GeneralSegurosController@getModelos');
Route::get('/getVersiones/{submarca_id}/{modelo}','GeneralSegurosController@getVersiones');
Route::get('/getContactos','GeneralSegurosController@getContactos');
Route::get('/getGiros','GeneralSegurosController@getGiros');
Route::get('/getEstadoCivil','GeneralSegurosController@getEstadoCivil');
Route::get('/getTitulos','GeneralSegurosController@getTitulos');

Route::post('/getCotizacionGS','GeneralSegurosController@getCotizacion');

Route::get('/getCoberturasGS/{cotizacion}/{paquete}','GeneralSegurosController@getCoberturas');

Route::get('/cp/{cp}','CPController@get');
