<?php

use App\Http\Controllers\Auth\StaafController;
use Illuminate\Support\Facades\Route;

Route::controller(StaafController::class)->group(function(){
    Route::get('/index/staff','index')->name('sttaf.index');
});
