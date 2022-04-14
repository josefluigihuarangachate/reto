<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

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


/*
  // http://127.0.0.1:8000/api/users
  Route::get('/users', function(Request $request){
  dump($request);
  return new \Illuminate\Http\JsonResponse([
  'data' => 'aaa'
  ]);
  });

  // http://127.0.0.1:8000/api/users/2
  Route::get('/users/{id}', function($id){
  return new \Illuminate\Http\JsonResponse([
  'data' => $id
  ]);
  });
 */

// - Listado de vehiculos
Route::get('/listadodevehiculos', [VehiculoController::class, 'show']);


// 
//- En una misma inspección no se debe tener registrado el mismo 
//  neumático mas de una vez, ósea solo se puede inspeccionar un 
//  neumático una sola vez por inspección.
//
Route::get('/inspeccionvehicular/{idvehiculo}', [VehiculoController::class, 'index']);
