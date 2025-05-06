<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BadgeController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/events', [EventController::class, 'index']);

Route::post('/badge-import', [BadgeController::class, 'import']);


Route::get('/health', fn() => response()->json(['status' => 'ok']));
