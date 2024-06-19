<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Endpoint untuk mendapatkan semua kategori
Route::get('/showkategori', [KategoriController::class, 'showAPIKategori']);
Route::put('editkategori/{kategori_id}', [KategoriController::class, 'updateAPIKategori']);
Route::post('createkategori',[KategoriController::class, 'createAPIKategori']);
Route::delete('deletekategori/{kategori_id}',[KategoriController::class, 'deleteAPIKategori']);
