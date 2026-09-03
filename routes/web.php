<?php

use App\Http\Controllers\AdmissionEnquiryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::post('/admission-enquiry', [AdmissionEnquiryController::class, 'store'])->name('admissions.store');
