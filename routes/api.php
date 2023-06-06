<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('auth')
    ->group(function () {
        Route::post('/', [AuthenticateController::class, 'login']);
    });

Route::prefix('record')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::post('/', [RecordController::class, 'store']);
        Route::get('/', [RecordController::class, 'index']);
        Route::get('/{id}', [RecordController::class, 'show']);
        Route::put('/{id}', [RecordController::class, 'update']);
        Route::delete('/{id}', [RecordController::class, 'delete']);
    });
