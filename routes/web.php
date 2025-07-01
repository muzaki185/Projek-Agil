<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransaksiController;

Route::get('/', [ObatController::class, 'index']);

// CRUD routes
Route::resource('obat', ObatController::class);
Route::resource('customer', CustomerController::class);
Route::resource('transaksi', TransaksiController::class);

// Tambahan untuk cetak laporan (jika ada)
Route::get('/transaksi/cetak/pdf', [TransaksiController::class, 'cetakPDF'])->name('transaksi.cetak.pdf');
