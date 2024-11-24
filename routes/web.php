<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\frontEnd\HomeController;
use App\Http\Controllers\frontend\layanan\LayananLaporanHewanHilangController;
use App\Http\Controllers\frontend\layanan\LayananLihatHewanSiapAdopsiController;
use App\Http\Controllers\frontend\layanan\LayananPengajuanPenyerahanHewanController;
use App\Http\Controllers\frontend\status\StatusLaporanPenemuanHewanHilangController;
use App\Http\Controllers\frontend\status\StatusPengajuanPengadopsianHewanController;
use App\Http\Controllers\frontend\status\StatusPengajuanPenyerahanHewanController;
use App\Http\Controllers\frontEnd\TentangKamiController;
use App\Http\Controllers\internal\animal\DataHewanController;
use App\Http\Controllers\internal\form\FormAdopsiController;
use App\Http\Controllers\internal\form\FormHandoverController;
use App\Http\Controllers\internal\form\FormReportController;
use App\Http\Controllers\internal\home\DashboardController;
use App\Http\Controllers\internal\settings\InformasiShelterController;
use App\Http\Controllers\internal\settings\PertanyaanPengadopsianController;
use App\Http\Controllers\internal\settings\PertanyaanPenyerahanController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/layanan-laporan-hewan-hilang', [LayananLaporanHewanHilangController::class, 'index'])->name('layanan-laporan');
Route::get('/layanan-lihat-hewan-siap-adopsi', [LayananLihatHewanSiapAdopsiController::class, 'index'])->name('layanan-lihat');
Route::get('/layanan-pengajuan-penyerahan-hewan', [LayananPengajuanPenyerahanHewanController::class, 'index'])->name('layanan-pengajuan');

Route::get('/status-laporan-penemuan-hewan-hilang', [StatusLaporanPenemuanHewanHilangController::class, 'index'])->name('status-laporan');
Route::get('/status-pengajuan-pengadopsian-hewan', [StatusPengajuanPengadopsianHewanController::class, 'index'])->name('status-adopsi');
Route::get('/status-pengajuan-penyerahan-hewan', [StatusPengajuanPenyerahanHewanController::class, 'index'])->name('status-penyerahan');

//admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/form-adopsi', [FormAdopsiController::class, 'index'])->name('formAdopsi.index');

Route::get('/form-handover', [FormHandoverController::class, 'index'])->name('formHandover.index');

Route::get('/informasi-shelter', [InformasiShelterController::class, 'index'])->name('informasiShelter.index');

Route::get('/pertanyaan-pengadopsian', [PertanyaanPengadopsianController::class, 'index'])->name('pertanyaanPengadopsian.index');

Route::get('/pertanyaan-penyerahan', [PertanyaanPenyerahanController::class, 'index'])->name('pertanyaanPenyerahan.index');

Route::prefix('admin')->group(function () {

    // REGION DATA HEWAN
    Route::prefix('data-hewan')->group(function () {
        Route::get('/daftar', [DataHewanController::class, 'index'])->name('dataHewan.index');
        Route::get('/detail-hewan/{animal_id}', [DataHewanController::class, 'detail'])->name('dataHewan.detail');
        Route::get('/edit-data-hewan/{animal_id}', [DataHewanController::class, 'edit'])->name('dataHewan.edit');
        Route::post('/edit-data-hewan-post', [DataHewanController::class, 'editPost'])->name('dataHewan.edit.post');
    });

    // REGION FORM
    Route::prefix('form-report')->group(function () {
        Route::get('/daftar', [FormReportController::class, 'index'])->name('formReport.index');
        Route::get('/detail-report/{report_id}', [FormReportController::class, 'detail'])->name('formReport.detail');
        Route::get('/edit-data-report/{report_id}', [FormReportController::class, 'edit'])->name('formReport.edit');
        Route::post('/edit-data-report-post', [FormReportController::class, 'editPost'])->name('formReport.edit.post');
    });

    Route::prefix('form-adopsi')->group(function () {
        Route::get('/daftar', [FormAdopsiController::class, 'index'])->name('formAdopsi.index');
        Route::get('/detail-form-adopsi/{adoption_form_id}', [FormAdopsiController::class, 'detail'])->name('formAdopsi.detail');
        Route::get('/edit-form-adopsi/{adoption_form_id}', [FormAdopsiController::class, 'edit'])->name('formAdopsi.edit');
        Route::post('/edit-form-adopsi-post', [FormAdopsiController::class, 'editPost'])->name('formAdopsi.edit.post');
    });

    // REGION KONFIGURASI
    Route::prefix('data-informasi-shelter')->group(function () {
        Route::get('/daftar', [InformasiShelterController::class, 'index'])->name('informasiShelter.index');
        Route::get('/edit-informasi-shelter', [InformasiShelterController::class, 'edit'])->name('informasiShelter.edit');
        Route::post('/edit-informasi-shelter-post', [InformasiShelterController::class, 'editPost'])->name('informasiShelter.edit.post');
    });

    Route::prefix('data-pertanyaan-pengadopsian')->group(function () {
        Route::get('/daftar', [PertanyaanPengadopsianController::class, 'index'])->name('pertanyaanPengadopsian.index');
        Route::get('/edit', [PertanyaanPengadopsianController::class, 'edit'])->name('pertanyaanPengadopsian.edit');
    });

    Route::prefix('data-pertanyaan-penyerahan')->group(function () {
        Route::get('/daftar', [PertanyaanPenyerahanController::class, 'index'])->name('pertanyaanPenyerahan.index');
        Route::get('/edit', [PertanyaanPenyerahanController::class, 'edit'])->name('pertanyaanPenyerahan.edit');
    });
});

// Route::post('/test-upload', [DataHewanController::class, 'testUploadGambar'])->name('animal.uploadGambar');



// Auth Routing
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar');


Route::get('/masuk', [AuthController::class, 'masuk'])->name('masuk');


Route::group(['middleware' => 'role:admin'], function () {});

Route::group(['middleware' => 'role:user'], function () {});
