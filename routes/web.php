<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

// Redirect root ke halaman produk
Route::get('/', function () {
    return redirect()->route('produk.index');
});

// Route Resource untuk CRUD Produk
Route::resource('produk', ProdukController::class);

// Route tambahan untuk Soft Delete
Route::get('/produk/deleted', [ProdukController::class, 'deleted'])->name('produk.deleted');
Route::patch('/produk/restore/{id}', [ProdukController::class, 'restore'])->name('produk.restore');
Route::delete('/produk/force-delete/{id}', [ProdukController::class, 'forceDelete'])->name('produk.forceDelete');

// Tambahan Restore All & Force Delete All
Route::patch('/produk/restore-all', [ProdukController::class, 'restoreAll'])->name('produk.restoreAll');
Route::delete('/produk/force-delete-all', [ProdukController::class, 'forceDeleteAll'])->name('produk.forceDeleteAll');
