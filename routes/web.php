<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Master\CalegController;
use App\Http\Controllers\Master\KabupatenKotaController;
use App\Http\Controllers\Master\KecamatanController;
use App\Http\Controllers\Master\KelurahanController;
use App\Http\Controllers\Master\ParpolController;
use App\Http\Controllers\Master\ProvinsiController;
use App\Http\Controllers\PengusulController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\QuickCount\UploadC1Controller;
use App\Http\Controllers\RekapTpsController;
use App\Http\Controllers\SelectController;
use App\Http\Controllers\TpsController;
use App\Http\Controllers\TpsPemilihController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', LogoutController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/', [DashboardController::class, 'index']);

    // rekap tps
    Route::get('/rekap-tps', [RekapTpsController::class, 'index']);
    Route::post('/rekap-tps', [RekapTpsController::class, 'index']);

    // TPS
    Route::get('/tps', [TpsController::class, 'index']);
    Route::post('/tps', [TpsController::class, 'index']);
    Route::get('/tps/create', [TpsController::class, 'create']);
    Route::post('/tps/create', [TpsController::class, 'store']);
    Route::delete('/tps', [TpsController::class, 'destroy']);
    Route::get('/tps/edit/{tps}', [TpsController::class, 'edit']);
    Route::put('/tps/edit/{tps}', [TpsController::class, 'update']);
    Route::get('/tps/show/{tps}', [TpsController::class, 'show']);
    Route::post('/tps/show/{tps}', [TpsPemilihController::class, 'import_excel']);

    Route::get('/tps/update/{tps}', [TpsPemilihController::class, 'updateKelurahan']);

    Route::get('/tps/show/{tps}/pengusul/{pengusul}', [PengusulController::class, 'index']);

    // Parpol
    Route::get('/parpol', [ParpolController::class, 'index']);
    Route::get('/parpol/create', [ParpolController::class, 'create']);
    Route::post('/parpol/create', [ParpolController::class, 'store']);
    Route::get('/parpol/edit/{parpol}', [ParpolController::class, 'edit']);
    Route::put('/parpol/edit/{parpol}', [ParpolController::class, 'update']);
    Route::get('/parpol/hapus/{id}', [ParpolController::class, 'delete']);

    // Caleg
    Route::get('/caleg', [CalegController::class, 'index']);
    Route::get('/caleg/create', [CalegController::class, 'create']);
    Route::post('/caleg/create', [CalegController::class, 'store']);
    Route::get('/caleg/edit/{caleg}', [CalegController::class, 'edit']);
    Route::put('/caleg/edit/{caleg}', [CalegController::class, 'update']);
    Route::get('/caleg/hapus/{id}', [CalegController::class, 'delete']);

    // kabupaten kota
    Route::get('/kabupaten-kota', [KabupatenKotaController::class, 'index']);
    Route::post('/kabupaten-kota', [KabupatenKotaController::class, 'store']);
    Route::get('/kabupaten-kota/hapus/{id}', [KabupatenKotaController::class, 'delete']);

    // kecamatan
    Route::get('/kecamatan', [KecamatanController::class, 'index']);
    Route::post('/kecamatan', [KecamatanController::class, 'store']);

    // kelurahan
    Route::get('/kelurahan', [KelurahanController::class, 'index']);
    Route::post('/kelurahan', [KelurahanController::class, 'store']);

    // provinsi
    Route::get('/provinsi', [ProvinsiController::class, 'index']);
    Route::post('/provinsi', [ProvinsiController::class, 'store']);

    Route::get('/selectRegency', [SelectController::class, 'regency'])->name('regency');
    Route::get('/selectPartisipan', [SelectController::class, 'partisipan']);
    Route::get('/selectDistrict/{id}', [SelectController::class, 'district']);
    Route::get('/selectVillage/{id}', [SelectController::class, 'village']);

    // user profile

    Route::get('/user-profile', [ProfilController::class, 'index']);
    Route::post('/user-profile', [ProfilController::class, 'store']);

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user/create', [UserController::class, 'store']);

    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::patch('/user/edit/{user}', [UserController::class, 'update']);

    // Quick Count
    // Upload c1
    Route::get('/upload-c1', [UploadC1Controller::class, 'index']);
    Route::get('/upload-c1/saksi/show', [UploadC1Controller::class, 'showTps']);
    Route::post('/upload-c1/saksi/show', [UploadC1Controller::class, 'showTps']);
    // Route::get('/upload-c1/saksi/show/{village_id}', [UploadC1Controller::class, 'showTps']);
    Route::get('/upload-c1/{status}/tps/{tps}', [UploadC1Controller::class, 'form']);
    Route::post('/upload-c1/{status}/tps/{tps}', [UploadC1Controller::class, 'store']);

    Route::get('/upload-c1/{status}/edit/{tps}', [UploadC1Controller::class, 'edit']);
    Route::post('/upload-c1/{status}/edit/{tps}', [UploadC1Controller::class, 'update']);
});
