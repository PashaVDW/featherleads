<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->name('home.')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/enroll_sales', 'enrollSales')->name('enrollSales');
    Route::delete('/unenroll_sales', 'unenrollSales')->name('unenrollSales');
    Route::post('/enroll_finance', 'enrollFinances')->name('enrollFinances');
    Route::delete('/unenroll_finance', 'unenrollFinances')->name('unenrollFinances');
});

Route::resource('prospects', ProspectController::class)->middleware('auth');

Route::middleware('auth')->controller(SalesController::class)->name('sales.')->group(function () {
    Route::get('/sales', 'index')->name('index');
    Route::post('/sales/set_monthly_target', 'setMonthlyTarget')->name('addTarget');
    Route::post('/sales/setRPC', 'setRPCAmount')->name('setRPCAmount');
    Route::post('/sales/addSale', 'addSale')->name('addSale');
});

Route::middleware('auth')->controller(\App\Http\Controllers\FinanceController::class)->name('finance.')->group(function () {
    Route::get('/finance', 'index')->name('index');
    Route::post('/finance/store', 'store')->name('store');
});

Route::middleware('auth')->controller(\App\Http\Controllers\FinanceCategoryController::class)->name('finance.category.')->group(function () {
    Route::post('/finance/category/store', 'store')->name('store');
    Route::post('/finance/category/addDailyExpense', 'addDailyExpense')->name('addDailyExpense');
    Route::delete('/finance/category/clearDailyExpense', 'clearDailyExpense')->name('clearDailyExpense');
    Route::delete('/finance/category/deleteCategory', 'deleteCategory')->name('deleteCategory');
    Route::post('/finance/category/updateBudgets', 'updateBudgets')->name('updateBudgets');
});

Route::get('/google/redirect', [App\Http\Controllers\GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
