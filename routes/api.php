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

// API Resources
Route::apiResource('instalaciones10', 'Instalacion10ApiController');
Route::apiResource('instalaciones', 'InstalacionApiController');
Route::apiResource('reparaciones', 'ReparacionApiController');

// API Searches
Route::get('instalacionesfiltradas', 'InstalacionApiController@search');
Route::get('reparacionesfiltradas', 'ReparacionApiController@search');