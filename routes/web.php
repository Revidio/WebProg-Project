<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FeedbackController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/tips', [TipController::class, 'index']);
Route::get('/tips/{id}', [TipController::class, 'show']);
Route::get('/resources', [ResourceController::class, 'index']);
Route::get('/feedback/{tip_id}', [FeedbackController::class, 'create']);
Route::post('/feedback', [FeedbackController::class, 'store']);

// ADMIN TIP CRUD
Route::prefix('admin')->group(function () {

    Route::get('/tips', [\App\Http\Controllers\Admin\TipAdminController::class, 'index']);
    Route::get('/tips/create', [\App\Http\Controllers\Admin\TipAdminController::class, 'create']);
    Route::post('/tips', [\App\Http\Controllers\Admin\TipAdminController::class, 'store']);
    Route::get('/tips/{tip}/edit', [\App\Http\Controllers\Admin\TipAdminController::class, 'edit']);
    Route::put('/tips/{tip}', [\App\Http\Controllers\Admin\TipAdminController::class, 'update']);
    Route::delete('/tips/{tip}', [\App\Http\Controllers\Admin\TipAdminController::class, 'destroy']);
});