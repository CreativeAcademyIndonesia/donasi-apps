<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;

Route::get('/', [DonasiController::class, 'index'])->name('donasi.index');
Route::post('/', [DonasiController::class, 'store'])->name('donasi.store');
