<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\ChatController; // ✅ TAMBAH INI

/*
|--------------------------------------------------------------------------
| WEB ROUTES BKITA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard-siswa', [KonselingController::class, 'dashboardSiswa'])
        ->name('dashboard.siswa');

    Route::get('/dashboard-guru', [KonselingController::class, 'dashboardGuru'])
        ->name('dashboard.guru');

    /*
    |--------------------------------------------------------------------------
    | KONSELING SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/konseling', [KonselingController::class, 'create'])
        ->name('konseling');

    Route::post('/konseling', [KonselingController::class, 'store'])
        ->name('konseling.store');

    /*
    |--------------------------------------------------------------------------
    | RIWAYAT
    |--------------------------------------------------------------------------
    */

    Route::get('/riwayat', [KonselingController::class, 'riwayat'])
        ->name('riwayat');

    /*
    |--------------------------------------------------------------------------
    | CHAT
    |--------------------------------------------------------------------------
    */

    Route::get('/chat/{id}', [KonselingController::class, 'chat'])
        ->name('chat');

    Route::post('/chat/{id}', [KonselingController::class, 'sendMessage'])
        ->name('chat.send');

    // EDIT MESSAGE
    Route::get('/message/{id}/edit', [ChatController::class, 'edit'])
        ->name('message.edit');

    //  UPDATE MESSAGE
    Route::put('/message/{id}', [ChatController::class, 'update'])
        ->name('message.update');

    // DELETE MESSAGE
    Route::delete('/message/{id}', [ChatController::class, 'destroy'])
        ->name('message.delete');

    /*
    |--------------------------------------------------------------------------
    | GURU - DATA SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/guru/siswa', [KonselingController::class, 'dataSiswa'])
        ->name('guru.siswa');

    Route::delete('/guru/siswa/{id}', [KonselingController::class, 'hapusSiswa'])
        ->name('guru.siswa.hapus');

    /*
    |--------------------------------------------------------------------------
    | GURU - KONSELING
    |--------------------------------------------------------------------------
    */

    Route::get('/guru/konseling', [KonselingController::class, 'index'])
        ->name('guru.konseling');

    Route::get('/guru/konseling/siswa/{id}', [KonselingController::class, 'konselingBySiswa'])
        ->name('guru.konseling.siswa');

    Route::post('/guru/konseling/selesai/{id}', [KonselingController::class, 'selesai'])
        ->name('guru.konseling.selesai');

    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get('/guru/laporan', [KonselingController::class, 'laporan'])
        ->name('guru.laporan');

    /*
    |--------------------------------------------------------------------------
    | PROFILE
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});

/*
|--------------------------------------------------------------------------
| AUTH BREEZE
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';