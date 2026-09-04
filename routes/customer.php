<?php

use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Route;

Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer/index','index')->name('customer.index');
});
