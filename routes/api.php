<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

Route::get('/events', [EventController::class, 'index']);



Route::get('/health', fn() => response()->json(['status' => 'ok']));
