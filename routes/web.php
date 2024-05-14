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

Route::get('/user/quotation', [QuotationController::class, 'quotationsByUserEmail'])->name('userQuotation');

Route::get('/pharmacy/prescription', [PharmacyController::class, 'pharmacyQuotation'])->name('pharmacyQuotation');
Route::get('/pharmacy/add', [PharmacyController::class, 'addQuotation'])->name('addQuotation');
Route::get('/pharmacy/accept', [QuotationController::class, 'acceptQuotation'])->name('acceptQuotation');
Route::get('/pharmacy/decline', [QuotationController::class, 'declinQuotation'])->name('declinQuotation');
Route::get('/pharmacy/quotation', [QuotationController::class, 'seeIssedQuotation'])->name('seeIssedQuotation');

//course
Route::resource('/prescription', PharmacyController::class);
// Route::post('/prescription/{id}/accept', [PharmacyController::class, 'accept'])->name('prescription.accept');
// Route::post('/prescription/{id}/decline', [PharmacyController::class, 'decline'])->name('prescription.decline');

//course
Route::resource('/quotation', QuotationController::class);
Route::post('/quotation/{id}/accept', [QuotationController::class, 'accept'])->name('quotation.accept');
Route::post('/quotation/{id}/decline', [QuotationController::class, 'decline'])->name('quotation.decline');
Route::post('/send-email', [QuotationController::class, 'sendEmail'])->name('sendEmail');
