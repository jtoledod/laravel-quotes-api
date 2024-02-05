<?php

use App\Enums\UserRole;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteQuoteController;
use App\Http\Controllers\QuoteApiController;
use App\Http\Controllers\RegisterUserController;
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

Route::post('/register', RegisterUserController::class)->name('register');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');
Route::get('/quotes-api', [QuoteApiController::class, 'allQuotes'])->name('quotes-api');
Route::get('/quotes-api/random', [QuoteApiController::class, 'randomQuote'])->name('quotes-api.random');

Route::middleware(['auth:sanctum', 'role:' . UserRole::ROLE_ADMIN->value])->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/ban', [AdminUserController::class, 'ban'])->name('admin.users.ban');
    Route::post('/admin/users/{user}/activate', [AdminUserController::class, 'activate'])->name('admin.users.activate');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/quotes', FavoriteQuoteController::class)->except('show', 'update');
});
