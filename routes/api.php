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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::prefix('auth')->group(function(){
    Route::post('login', 'API\AuthController@login')->name('login');
    //Route::post('registro', 'API\AuthController@registro')->name('user.create');
    Route::get('logout', 'API\AuthController@logout')->middleware('auth:api')->name('logout');
});

Route::middleware(['auth:api'])->group(function(){
    Route::apiResource('conversacion','API\ConversacionController');
    Route::apiResource('conversacion.mensaje','API\MensajeController')->except('update');
    Route::apiResource('usuario','API\UsuarioController');
});
