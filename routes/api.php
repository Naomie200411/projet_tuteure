<?php

use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateWithToken;

Route::post('/login',[LoginController::class, 'login'])->name('login');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'updateUser']);
Route::delete('/users/{id}', [UserController::class, 'destroyUser']);


Route::middleware("auth:sanctum")->group(function () {
    Route::resource('etab', EtablissementController::class);
    Route::post('/logout', [LoginController::class, 'logout']);

});
Route::middleware("auth:sanctum")->get('/user', function (Request $request) {
    return $request->user();
});



