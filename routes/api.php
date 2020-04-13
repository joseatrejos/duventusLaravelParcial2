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

// Route::middleware('auth:api')->get('/user', function (Request $request) { return $request->user();});

/*
Route::middleware('auth:api') -> get('/instalaciones', 'InstalacionApiController@usuario');
Route::middleware('auth:api') -> get('/reparaciones', 'ReparacionApiController@usuario');
Route::middleware('auth:api') -> get('/usuario', 'UsuarioApiController@usuario');

// ??
Route::middleware('auth:api') -> post('/suma', 'UsuarioApiController@suma'); */

// API Resources
Route::apiResource('instalaciones', 'InstalacionApiController');
Route::apiResource('reparaciones', 'ReparacionApiController');
Route::apiResource('usuarios', 'UsuarioApiController');
