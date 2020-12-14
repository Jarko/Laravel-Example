<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TeamController;

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

Route::get('teams', [TeamController::class, 'index']);
Route::get('teams/{team}', [TeamController::class, 'show']);
Route::post('teams', [TeamController::class, 'store']);
Route::put('teams/{team}', [TeamController::class, 'update']);
Route::delete('teams/{team}', [TeamController::class, 'delete']);

