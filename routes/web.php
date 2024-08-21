<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::resource('leads', LeadController::class)->middleware('auth');

Route::middleware('auth')->controller(\App\Http\Controllers\FinanceController::class)->name('finance.')->group(function () {
    Route::get('/finance', 'index')->name('index');
    Route::post('/finance/store', 'store')->name('store');
});

Route::middleware('auth')->controller(\App\Http\Controllers\FinanceCategoryController::class)->name('finance.category.')->group(function () {
    Route::post('/finance/category/store', 'store')->name('store');
    Route::post('/finance/category/addDailyExpense', 'addDailyExpense')->name('addDailyExpense');
    Route::delete('/finance/category/clearDailyExpense', 'clearDailyExpense')->name('clearDailyExpense');
    Route::delete('/finance/category/deleteCategory', 'deleteCategory')->name('deleteCategory');
});

Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
