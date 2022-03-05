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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json(['message' => 'Serviço ok', 'status' => 'Connected']);
});

Route::post('cliente', 'CustomerController@store');
Route::put('cliente/{id}', 'CustomerController@update');
Route::delete('cliente/{id}', 'CustomerController@destroy');
Route::get('cliente/{id}', 'CustomerController@show');
Route::get('consulta/final-placa/{plate}', 'CustomerController@endOfPlate');


