<?php

use App\Services\CurrencyConverter\CurrencyConverterInterface;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/sync-user-invoice', function (Request $request, CurrencyConverterInterface $converter) {

    return [
        ['id' => 100, 'client_id' => 5, 'currency' => 'USD', 'amount' => $converter->currencyConverter('USD', 'EUR', 120)],
        ['id' => 150, 'client_id' => 10, 'currency' => 'EUR', 'amount' => $converter->currencyConverter('USD', 'EUR', 150)],   
    ];
});