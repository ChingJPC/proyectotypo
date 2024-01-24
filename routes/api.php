<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\TipomascotaApiController;
use App\Http\Controllers\API\InformacionApiController;
use App\Http\Controllers\API\AgendamientoApiController;
use App\Http\Controllers\API\ActividadApiController;
use App\Http\Controllers\API\Informacion_ActividadController;
//use App\Http\Controllers\API\HomeApiController;
use App\Http\Controllers\API\RolApiController;
use App\Http\Controllers\API\UsuarioApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Route::apiResource('Agendamiento',AgendamientoApiController::class );

//Route::apiResource('Tipomascota', TipomascotaApiController::class);

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,"login"]);
    Route::post('signup', [AuthController::class,"signup"]);
    Route::post('signupadmin', [AuthController::class,"signupadmin"]);
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class,"logout"]);
        Route::get('user', [AuthController::class, 'user']);
   
          Route::apiResource('Informacion', InformacionApiController::class);
          Route::apiResource('Agendamiento',AgendamientoApiController::class );
          Route::apiResource('Tipomascota', TipomascotaApiController::class);
          Route::apiResource('Actividad', ActividadApiController ::class);
          Route::apiResource('Informacion_Actividad', Informacion_ActividadController::class);
          //Route::apiResource('Home', HomeApiController::class);
          Route::apiResource('Rol',RolApiController::class);
          Route::apiResource('Usuario',UsuarioApiController::class);
          //Route::post('Tipomascota', [TipomascotaApiController::class,"store"]);

          Route::group(['middleware' => ['role:Administrator']], function () {
          Route::apiResource('Tipomascota', TipomascotaApiController::class);
          Route::get('tipomascota/{id}/destroy', 'TipomascotaApiController@destroy')->name('tipomascota.destroy');
        });
      });
});

