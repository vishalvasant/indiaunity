<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExchangeRateController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Exchange Rate API Routes
Route::prefix('exchange-rates')->group(function () {
    Route::get('/rate', [ExchangeRateController::class, 'getRate']);
    Route::get('/rates', [ExchangeRateController::class, 'getRates']);
    Route::get('/convert', [ExchangeRateController::class, 'convert']);
    Route::get('/currencies', [ExchangeRateController::class, 'getCurrencies']);
});