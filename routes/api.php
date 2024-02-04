<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteQuoteController;
use App\Http\Controllers\QuoteApiController;
use App\Http\Controllers\RegisterUserController;
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

Route::post('/register', RegisterUserController::class)->name('register');
Route::post('/login', AuthController::class)->name('login');
Route::get('/quotes-api', [QuoteApiController::class, 'allQuotes'])->name('quotes-api');
Route::get('/quotes-api/random', [QuoteApiController::class, 'randomQuote'])->name('quotes-api.random');

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('/quotes', FavoriteQuoteController::class)->except('show', 'update');
});
