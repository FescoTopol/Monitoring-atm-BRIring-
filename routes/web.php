<?php

use App\Models\Pegawai;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TidController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelengkapanController;
use App\Http\Controllers\KeamananController;
use App\Http\Controllers\UkerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Models\Kelengkapan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');

Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'ceklevel:Admin']], function(){
    Route::get('/uker', [UkerController::class, 'index'])->name('uker');
    Route::get('/tambah-uker', [UkerController::class, 'create'])->name('tambah-uker');
    Route::post('/simpan-uker', [UkerController::class, 'store'])->name('simpan-uker');
    Route::get('/edit-uker/{id}', [UkerController::class, 'edit'])->name('edit-uker');
    Route::post('/update-uker/{id}', [UkerController::class, 'update'])->name('update-uker');
    Route::get('/delete-uker/{id}', [UkerController::class, 'destroy'])->name('delete-uker');

    Route::get('/tid', [TidController::class, 'index'])->name('tid');
    Route::get('/tambah-tid', [TidController::class, 'create'])->name('tambah-tid');
    Route::post('/simpan-tid', [TidController::class, 'store'])->name('simpan-tid');
    Route::get('/edit-tid/{id}', [TidController::class, 'edit'])->name('edit-tid');
    Route::post('/update-tid/{id}', [TidController::class, 'update'])->name('update-tid');
    Route::get('/delete-tid/{id}', [TidController::class, 'destroy'])->name('delete-tid');
    Route::get('/cetak-tid', [TidController::class, 'cetak'])->name('cetak-tid');

});

Route::group(['middleware' => ['auth', 'ceklevel:Admin,Pegawai']], function(){
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/tambah-pegawai', [PegawaiController::class, 'create'])->name('tambah-pegawai');
    Route::post('/simpan-pegawai', [PegawaiController::class, 'store'])->name('simpan-pegawai');
    Route::get('/edit-pegawai/{id}', [PegawaiController::class, 'edit'])->name('edit-pegawai');
    Route::post('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update-pegawai');
    Route::get('/delete-pegawai/{id}', [PegawaiController::class, 'destroy'])->name('delete-pegawai');
    Route::get('/cetak-pegawai', [PegawaiController::class, 'cetak'])->name('cetak-pegawai');
    // Route::get('/exportPDF', [PegawaiController::class, 'exportPDF'])->name('exportPDF');

    Route::get('/kelengkapan', [KelengkapanController::class, 'index'])->name('kelengkapan');
    Route::get('/tambah-kelengkapan', [KelengkapanController::class, 'create'])->name('tambah-kelengkapan');
    Route::post('/simpan-kelengkapan', [KelengkapanController::class, 'store'])->name('simpan-kelengkapan');
    Route::get('/edit-kelengkapan/{id}', [KelengkapanController::class, 'edit'])->name('edit-kelengkapan');
    Route::post('/update-kelengkapan/{id}', [KelengkapanController::class, 'update'])->name('update-kelengkapan');
    Route::get('/delete-kelengkapan/{id}', [KelengkapanController::class, 'destroy'])->name('delete-kelengkapan');

    Route::get('/keamanan', [KeamananController::class, 'index'])->name('keamanan');
    Route::get('/tambah-keamanan', [KeamananController::class, 'create'])->name('tambah-keamanan');
    Route::post('/simpan-keamanan', [KeamananController::class, 'store'])->name('simpan-keamanan');
    Route::get('/edit-keamanan/{id}', [KeamananController::class, 'edit'])->name('edit-keamanan');
    Route::post('/update-keamanan/{id}', [KeamananController::class, 'update'])->name('update-keamanan');
    Route::get('/delete-keamanan/{id}', [KeamananController::class, 'destroy'])->name('delete-keamanan');

   

    Route::get('/home', [HomeController::class, 'Home']);
});
    