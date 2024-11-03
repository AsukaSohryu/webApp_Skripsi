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
use App\Http\Controllers\internal\form\FormAdopsiController;
use App\Http\Controllers\internal\form\FormHandoverController;
use App\Http\Controllers\internal\form\FormReportController;
use App\Http\Controllers\internal\home\DashboardController;
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

Route::get('/tentang-kami' ,[TentangKamiController::class, 'index'])->name('tentang-kami');

Route::get('/layanan-laporan-hewan-hilang', [LayananLaporanHewanHilangController::class, 'index'])->name('layanan-laporan');
Route::get('/layanan-lihat-hewan-siap-adopsi', [LayananLihatHewanSiapAdopsiController::class, 'index'])->name('layanan-lihat');
Route::get('/layanan-pengajuan-penyerahan-hewan', [LayananPengajuanPenyerahanHewanController::class, 'index'])->name('layanan-pengajuan');

Route::get('/status-laporan-penemuan-hewan-hilang', [StatusLaporanPenemuanHewanHilangController::class, 'index'])->name('status-laporan');
Route::get('/status-pengajuan-pengadopsian-hewan', [StatusPengajuanPengadopsianHewanController::class, 'index'])->name('status-adopsi');
Route::get('/status-pengajuan-penyerahan-hewan', [StatusPengajuanPenyerahanHewanController::class, 'index'])->name('status-penyerahan');

//admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/form-adopsi', [FormAdopsiController::class, 'index'])->name('formAdopsi');

Route::get('/form-handover',[FormHandoverController::class, 'index'])->name('formHandover');

Route::get('/form-report',[FormReportController::class, 'index'])->name('formReport');



// Auth Routing
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar');


Route::get('/masuk', [AuthController::class, 'masuk'])->name('masuk');


Route::group(['middleware' => 'role:admin'], function() {
    
    
});

Route::group(['middleware' => 'role:user'], function() {
    
    
});
