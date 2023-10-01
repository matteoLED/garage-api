<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\HomeController;

Route::get('/', HomeController::class);

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users/add', [UserController::class, 'createUser']);
Route::get('/users/{id}', [UserController::class, 'getUserById']);

