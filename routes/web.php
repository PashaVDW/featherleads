<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware('auth');

Route::resource('leads', LeadController::class)->middleware('auth');

Route::middleware('auth')->controller(\App\Http\Controllers\FinanceController::class)->name('finance.')->group(function () {
    Route::get('/finance', 'index')->name('index');
});
