<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PharmacyController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//main router for admin and user
Route::get('/home', [HomeController::class, 'index']);

Route::get('/user/quotation', [QuotationController::class, 'userQuotation'])->name('userQuotation');

Route::get('/pharmacy/prescription', [PharmacyController::class, 'pharmacyQuotation'])->name('pharmacyQuotation');
Route::get('/pharmacy/add', [PharmacyController::class, 'addQuotation'])->name('addQuotation');
