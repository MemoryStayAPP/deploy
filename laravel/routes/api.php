<?php

use App\Http\Controllers\Auth\CreateUserController;
use App\Http\Controllers\Auth\DeleteUserController;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Marker\CreateController;
use App\Http\Controllers\Marker\DeleteController;
use App\Http\Controllers\Marker\SelectController;
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

Route::post('/auth/register', [CreateUserController::class, 'createUser']);
Route::post('/auth/login', [LoginUserController::class, 'loginUser']);
Route::post('/auth/delete', [DeleteUserController::class, 'deleteUser']);
Route::post('/markers/create', [CreateController::class, 'createMarker']);
Route::post('/markers/delete', [DeleteController::class, 'deleteMarker']);
Route::post('/markers/select', [SelectController::class, 'selectMarker']);
Route::get('/markers/get', [SelectController::class, 'getMarkers']);
