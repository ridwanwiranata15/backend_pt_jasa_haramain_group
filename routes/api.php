<?php

use Illuminate\Support\Facades\Route;


//route login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'index']);

//group route with middleware "auth"
Route::group(['middleware' => 'auth:api'], function () {
    //logout
    Route::post('/logout', [App\Http\Controllers\Api\Auth\LoginController::class, 'logout']);
});


//group route with middleware "auth:api"
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/dashboard', App\Http\Controllers\DashboardController::class);
    Route::get('/permissions', [\App\Http\Controllers\PermissionController::class, 'index']);
    Route::get('/permissions/all', [\App\Http\Controllers\PermissionController::class, 'all']);
    Route::get('/roles/all', [\App\Http\Controllers\RoleController::class, 'all']);
    Route::apiResource('/roles', App\Http\Controllers\RoleController::class);
    Route::apiResource('/users', App\Http\Controllers\UserController::class);
});
