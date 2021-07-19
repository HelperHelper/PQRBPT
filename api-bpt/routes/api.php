<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuejaController;
use App\Http\Controllers\ReclamoPeticionController;
use App\Http\Controllers\ReclamoQuejaController;
use App\Http\Controllers\RespuestaPeticionController;
use App\Http\Controllers\RespuestaQuejaController;


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

Route::resource('peticiones','App\Http\Controllers\PeticionController');
Route::resource('quejas', QuejaController::class);
Route::resource('reclamopeticion', ReclamoPeticionController::class);
Route::resource('reclamoqueja', ReclamoQuejaController::class);
Route::resource('respuestapeticion', RespuestaPeticionController::class);
Route::resource('respuestaqueja', RespuestaQuejaController::class); 


