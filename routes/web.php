<?php

use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\GolonganCon;
use App\Http\Controllers\GajiCon;
use App\Http\Controllers\LemburCon;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('index');
});

// Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::post('/pegawai/storetambah', [PegawaiController::class, 'storetambah']);

Route::post('/pegawai/update/{id}', [PegawaiController::class, 'storeupdate']);

Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'destroy']);



// Golongan
Route::get('/golongan', [GolonganCon::class, 'index']);

Route::get('/golongan/tambah', [GolonganCon::class, 'tambah']);

Route::post('/golongan/storetambah', [GolonganCon::class, 'storetambah']);

Route::get('/golongan/edit/{id}', [GolonganCon::class, 'edit']);

Route::post('/golongan/update/{id}', [GolonganCon::class, 'storeupdate']);

Route::delete('/golongan/delete/{id}', [GolonganCon::class, 'destroy']);


// Gaji
Route::get('/gaji', [GajiCon::class, 'index']);

Route::get('/gaji/tambah', [GajiCon::class, 'tambah']);

Route::post('/gaji/storetambah', [GajiCon::class, 'storetambah']);

Route::get('/gaji/edit/{id}', [GajiCon::class, 'edit']);

Route::post('/gaji/update/{id}', [GajiCon::class, 'storeupdate']);

Route::delete('/gaji/delete/{id}', [GajiCon::class, 'destroy']);


// Lembur
Route::get('/lembur', [LemburCon::class, 'index']);

Route::get('/lembur/tambah', [LemburCon::class, 'tambah']);

Route::post('/lembur/storetambah', [LemburCon::class, 'storetambah']);

Route::get('/lembur/edit/{id}', [LemburCon::class, 'edit']);

Route::post('/lembur/update/{id}', [LemburCon::class, 'storeupdate']);

Route::delete('/lembur/delete/{id}', [LemburCon::class, 'destroy']);
