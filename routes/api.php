<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\CustomerTestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UsedVehicleController;


Route::get('/', HomeController::class);

Route::get('/users', [UserController::class, 'getUsers']);
Route::post('/users/add', [UserController::class, 'createUser']);
Route::get('/user/{id}', [UserController::class, 'getUserById']);
Route::put('/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'deleteUser']);



Route::get('/hours', [HourController::class, 'getHour']);
Route::post('/hour/add', [HourController::class, 'createHour']);
Route::get('/hour/{id}', [HourController::class, 'getHoyrById']);
Route::put('/hours/{id}', [HourController::class, 'updateHour']);
Route::delete('/hours/{id}', [HourController::class, 'deleteHour']);


Route::get('/customer/testimonials', [CustomerTestimonialController::class, 'getCustomerTestimonial']);
Route::post('/customer/testimonial/add', [CustomerTestimonialController::class, 'createCustomerTestimonial']);
Route::get('/customer/testimonial/{id}', [CustomerTestimonialController::class, 'getCustomerTestimonialById']);
Route::put('/customer/testimonials/{id}', [CustomerTestimonialController::class, 'updateCustomerTestimonial']);
Route::delete('/customer/testimonials/{id}', [CustomerTestimonialController::class, 'deleteCustomerTestimonial']);


Route::get('/contacts', [ContactController::class, 'getContact']);
Route::post('/contact/add', [ContactController::class, 'createContact']);
Route::get('/contact/{id}', [ContactController::class, 'getContactById']);
Route::put('/contacts/{id}', [ContactController::class, 'updateContact']);
Route::delete('/contacts/{id}', [ContactController::class, 'deleteContact']);


Route::get('/used/vehicles', [UsedVehicleController::class, 'getUsedVehicles']);
Route::post('/used/vehicle/add', [UsedVehicleController::class, 'createUsedVehicle']);
Route::get('/used/vehicles/{id}', [UsedVehicleController::class, 'getUsedVehicleById']);
Route::put('/used/vehicle/{id}', [UsedVehicleController::class, 'updateUsedVehicle']);
Route::delete('/used/vehicle/{id}', [UsedVehicleController::class, 'deleteUsedVehicle']);
