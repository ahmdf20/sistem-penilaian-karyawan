<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(UserController::class)->group(function () {
    Route::delete('/pegawai/hapus/{uuid}', 'hapus')->name('pegawai.hapus');

    Route::get('/pegawai', 'index')->name('pegawai');
    Route::get('/pegawai/tambah', 'tambah')->name('pegawai.tambah');
    Route::get('/pegawai/detail/{uuid}', 'detail')->name('pegawai.detail');
    Route::get('/pegawai/edit/{uuid}', 'edit')->name('pegawai.edit');
    Route::get('/pegawai/edit/password/{uuid}', 'edit_password')->name('pegawai.edit.password');

    Route::post('/pegawai/store', 'store')->name('pegawai.store');

    Route::put('/pegawai/update/{uuid}', 'update')->name('pegawai.update');
    Route::put('/pegawai/update/password/{uuid}', 'update_password')->name('pegawai.update.password');
});

Route::controller(ProyekController::class)->group(function () {
    Route::delete('/proyek/hapus/{uuid}', 'hapus')->name('proyek.hapus');

    Route::get('/proyek', 'index')->name('proyek');
    Route::get('/proyek/tambah', 'tambah')->name('proyek.tambah');

    Route::post('/proyek/store', 'store')->name('proyek.store');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/task', 'index')->name('task');
});
