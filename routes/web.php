<?php

use Illuminate\Support\Facades\Route;

// Route dengan closure (inline function)
Route::get('/', function () {
    return view('welcome');
});

// Route dengan parameter
Route::get('/halo/{nama}', function (string $nama) {
 return "Halo, {$nama}! Selamat datang di praktikum Laravel.";
});

// Route dengan multiple parameter
Route::get('/mahasiswa/{nim}/{nama}', function (string $nim, string $nama) {
 return "NIM: {$nim} | Nama: {$nama}";
});

// Route dengan parameter opsional
Route::get('/kampus/{nama?}', function (string $nama = 'Universitas') {
    return "Selamat datang di {$nama}";
    });

use App\Http\Controllers\MahasiswaController;

// Route untuk memanggil Controller
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])
    ->middleware('log.request');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']); 
Route::get('/mahasiswa/{nim}', [MahasiswaController::class, 'show']); // 

use Illuminate\Http\Request;

// Route POST untuk menangani data form submission mahasiswa
Route::post('/mahasiswa', function (Request $request) {
    return response()->json([
        'message' => 'Data mahasiswa berhasil diterima',
        'data' => [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'jurusan' => $request->input('jurusan'),
        ]
    ]);
});