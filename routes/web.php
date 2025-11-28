<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::withoutMiddleware([Authenticate::class])->group(function () {
    Auth::routes();
    ROute::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create-form');
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.update-form');
Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
Route::post('/mahasiswa/{mahasiswaId}/sync-mk', [MahasiswaController::class, 'syncMataKuliah'])->name('mahasiswa.syncMataKuliah');
Route::delete('mahasiswa/{mahasiswaId}/delete-mk/{mataKuliahId}', [MahasiswaController::class, 'deleteMataKuliah'])->name('mahasiswa.deleteMataKuliah');

Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('mata-kuliah.index');
Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create'])->name('mata-kuliah.create-form');
Route::post('/mata-kuliah/store', [MataKuliahController::class, 'store'])->name('mata-kuliah.store');
Route::get('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'show'])->name('mata-kuliah.update-form');
Route::patch('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'update'])->name('mata-kuliah.update');
Route::delete('/mata-kuliah/delete{id}', [MataKuliahController::class, 'delete'])->name('mata-kuliah.delete');

Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
Route::get('/dosen/create', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen/store', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/edit/{id}', [DosenController::class, 'show'])->name('dosen.show');
Route::patch('/dosen/edit/{id}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/dosen/delete/{id}', [DosenController::class, 'destroy'])->name('dosen.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
