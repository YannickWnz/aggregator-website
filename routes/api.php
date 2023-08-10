<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



// register users api routes
Route::post('register', [UserController::class, 'signupUser']);

// login users api routes
Route::post('login', [UserController::class, 'signUserIn']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});