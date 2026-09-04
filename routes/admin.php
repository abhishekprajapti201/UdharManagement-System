<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('system/login', 'login')->name('login');
    Route::get('/','loginView');
    Route::get('index/admin','index')->name('admin.index');
});
