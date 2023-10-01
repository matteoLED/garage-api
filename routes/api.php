<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\HourController;

Route::get('/', HomeController::class);

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users/add', [UserController::class, 'createUser']);
Route::get('/user/{id}', [UserController::class, 'getUserById']);



Route::get('/hours', [HourController::class, 'getHour']);
Route::post('/hour/add', [HourController::class, 'createHour']);
Route::get('/hour/{id}', [HourController::class, 'getHoyrById']);
Route::put('/hours/{id}', [HourController::class, 'updateHour']);
Route::delete('/hours/{id}', [HourController::class, 'deleteHour']);