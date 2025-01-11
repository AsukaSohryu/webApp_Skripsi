<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\frontEnd\HomeController;
use App\Http\Controllers\frontEnd\layanan\HewanDiselamatkanController;
use App\Http\Controllers\frontEnd\layanan\LayananLaporanHewanHilangController;
use App\Http\Controllers\frontEnd\layanan\LayananLihatHewanSiapAdopsiController;
use App\Http\Controllers\frontEnd\layanan\LayananPengajuanPenyerahanHewanController;
use App\Http\Controllers\frontEnd\profile\ProfileController;
use App\Http\Controllers\frontEnd\status\StatusReportController;
use App\Http\Controllers\frontEnd\status\StatusAdopsiController;
use App\Http\Controllers\frontEnd\status\StatusHandoverController;
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

// Auth Routing
Route::get('/daftar', [AuthController::class, 'daftar'])->name('daftar');
Route::post('/daftar-post', [AuthController::class, 'daftarPost'])->name('daftar.post');

Route::get('/masuk', [AuthController::class, 'masuk'])->name('masuk');
Route::post('/masuk-post', [AuthController::class, 'masukPost'])->name('masuk.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('lupa-kata-sandi')->group(function () {

    Route::get('/cek-email', [AuthController::class, 'forgotPass'])->name('cek-email');
    Route::post('/cek-email-post', [AuthController::class, 'checkEmail'])->name('cek-email.post');
    Route::get('/{email}/cek-otp', [AuthController::class, 'checkOtp'])->name('cek-otp');
    Route::post('/cek-otp-post', [AuthController::class, 'postOtp'])->name('cek-otp.post');
    Route::get('/{email}/ubah-kata-sandi' ,[AuthController::class, 'changePass'])->name('change-pass');
    Route::post('/ubah-kata-sandi-post' ,[AuthController::class, 'postPass'])->name('change-pass.post');
});

//Rescuer Pages Routing
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

//layanan
// shelter-us.com/layanan-kami/
Route::prefix('layanan-kami')->group(function () {

    Route::get('/lihat-hewan-yang-diselamatkan', [HewanDiselamatkanController::class, 'index'])->name('layanan-hewan-diselamatkan');

    Route::middleware('auth.popup')->group(function () {
        Route::get('/laporkan-penemuan-hewan-peliharaan-liar', [LayananLaporanHewanHilangController::class, 'index'])->name('layanan-laporan');
        Route::post('/laporan-hewan-hilang', [LayananLaporanHewanHilangController::class, 'indexPost'])->name('layanan-laporan-post');

        Route::get('/ajukan-penyerahan-hewan-peliharaan', [LayananPengajuanPenyerahanHewanController::class, 'index'])->name('layanan-pengajuan');
        Route::post('/pengajuan-penyerahan-hewan-create', [LayananPengajuanPenyerahanHewanController::class, 'createPost'])->name('layanan-pengajuan.create.Post');

        Route::get('/lihat-hewan-yang-siap-diadopsi', [LayananLihatHewanSiapAdopsiController::class, 'index'])->name('layanan-lihat');
        Route::get('/lihat-daftar-hewan-yang-siap-diadopsi/detail-hewan/{animal_id}', [LayananLihatHewanSiapAdopsiController::class, 'detailHewan'])->name('layanan-adopsi.detail');
        // Route::get('/ajukan-pengadopsian-hewan-peliharaan/formulir-adopsi/{animal_id}', [LayananLihatHewanSiapAdopsiController::class, 'create'])->name('layanan-adopsi.create')->middleware('auth.popup');
        Route::get('/lihat-daftar-hewan-yang-siap-diadopsi/detail-hewan/ajukan-pengadopsian-hewan-peliharaan/{animal_id}', [LayananLihatHewanSiapAdopsiController::class, 'create'])->name('layanan-adopsi.create')->middleware('auth.popup');
        Route::post('/pengajuan-pengadopsian-hewan/adoption-formulir-create/{animal_id}', [LayananLihatHewanSiapAdopsiController::class, 'createPost'])->name('layanan-adopsi.create.post');
    });
});

//status
Route::prefix('riwayat-laporan-dan-pengajuan')->middleware('auth.popup')->group(function () {

    Route::get('/riwayat-laporan-penemuan-hewan-peliharaan-liar', [StatusReportController::class, 'index'])->name('status-laporan');
    Route::get('/laporan-penemuan-hewan-hilang/detail/{report_id}', [StatusReportController::class, 'detail'])->name('status-laporan.detail');
    
    Route::get('/riwayat-pengajuan-penyerahan-hewan-peliharaan', [StatusHandoverController::class, 'index'])->name('status-penyerahan');
    Route::get('/riwayat-pengajuan-penyerahan-hewan/detail/{handover_form_id}', [StatusHandoverController::class, 'detail'])->name('status-penyerahan.detail');
    
    Route::get('/riwayat-pengajuan-pengadopsian-hewan-peliharaan', [StatusAdopsiController::class, 'index'])->name('status-adopsi');
    Route::get('/riwayat-pengajuan-pengadopsian-hewan/detail/{adoption_form_id}', [StatusAdopsiController::class, 'detail'])->name('status-adopsi.detail');
    Route::get('/riwayat-pengajuan-pengadopsian-hewan/detail-hewan-pengajuan-pengadopsian-hewan/{animal_id}', [StatusAdopsiController::class, 'detailHewan'])->name('status-adopsi.detailHewan');
});

//profil
Route::prefix('profil')->group(function () {

    Route::get('/detail-profil', [ProfileController::class, 'index'])->name('detail-profil');
    Route::get('/ubah-profil', [ProfileController::class, 'editShow'])->name('edit-profil');
    Route::post('/edit-profil-post', [ProfileController::class, 'editPost'])->name('edit-profil.post');
    Route::get('/ubah-kata-sandi', [ProfileController::class, 'editPasswordShow'])->name('edit-password');
    Route::post('/edit-password-post', [ProfileController::class, 'editPasswordPost'])->name('edit-password.post');
});

//admin
Route::prefix('admin')->middleware('role:Admin')->group(function () {

    Route::get('/dasbor', [DashboardController::class, 'index'])->name('dashboard');

    // REGION DATA HEWAN
    Route::prefix('data-hewan')->group(function () {
        
        Route::get('/daftar-data-hewan', [DataHewanController::class, 'index'])->name('dataHewan.index');
        Route::get('/daftar-data-hewan/detail-data-hewan/{animal_id}', [DataHewanController::class, 'detail'])->name('dataHewan.detail');
        Route::get('/daftar-data-hewan/detail-data-hewan/ubah-data-hewan/{animal_id}', [DataHewanController::class, 'edit'])->name('dataHewan.edit');

        Route::post('/edit-data-hewan-post', [DataHewanController::class, 'editPost'])->name('dataHewan.edit.post');

        Route::get('/daftar-data-hewan/tambah-hewan-baru', [DataHewanController::class, 'create'])->name('dataHewan.create');
        Route::post('/create-hewan-post', [DataHewanController::class, 'createPost'])->name('dataHewan.create.post');
    });
    
    // REGION FORM
    Route::prefix('laporan-dan-pengajuan')->group(function (){

        Route::get('/daftar-laporan-penemuan-hewan-peliharaan-liar', [FormReportController::class, 'index'])->name('formReport.index');
        Route::get('/daftar-laporan-penemuan-hewan-peliharaan-liar/detail-laporan-penemuan-hewan-peliharaan-liar/{report_id}', [FormReportController::class, 'detail'])->name('formReport.detail');
        Route::get('/daftar-laporan-penemuan-hewan-peliharaan-liar/detail-laporan-penemuan-hewan-peliharaan-liar/ubah-laporan-penemuan-hewan-peliharaan-liar/{report_id}', [FormReportController::class, 'edit'])->name('formReport.edit');

        Route::post('/edit-data-report-post', [FormReportController::class, 'editPost'])->name('formReport.edit.post');
        Route::patch('/report-is-seen/{id}/toggle', [FormReportController::class, 'toggleIsSeen'])->name('formReport.toggle.is_seen');

        Route::get('/daftar-pengajuan-penyerahan-hewan-peliharaan', [FormHandoverController::class, 'index'])->name('formHandover.index');
        Route::get('/daftar-pengajuan-penyerahan-hewan-peliharaan/detail-pengajuan-penyerahan-hewan-peliharaan/{handover_form_id}', [FormHandoverController::class, 'detail'])->name('formHandover.detail');
        Route::get('/daftar-pengajuan-penyerahan-hewan-peliharaan/detail-pengajuan-penyerahan-hewan-peliharaan/ubah-pengajuan-penyerahan-hewan-peliharaan/{handover_form_id}', [FormHandoverController::class, 'edit'])->name('formHandover.edit');

        Route::post('/edit-form-handover-post', [FormHandoverController::class, 'editPost'])->name('formHandover.edit.post');
        Route::post('/test-upload', [FormHandoverController::class, 'testUploadGambar'])->name('formHandover.uploadGambar');
        Route::patch('/handover-is-seen/{id}/toggle', [FormHandoverController::class, 'toggleIsSeen'])->name('formHandover.toggle.is_seen');

        Route::get('/daftar-pengajuan-pengadopsian-hewan-peliharaan', [FormAdopsiController::class, 'index'])->name('formAdopsi.index');
        Route::get('/daftar-pengajuan-pengadopsian-hewan-peliharaan/detail-pengajuan-pengadopsian-hewan-peliharaan/{adoption_form_id}', [FormAdopsiController::class, 'detail'])->name('formAdopsi.detail');
        Route::get('/daftar-pengajuan-pengadopsian-hewan-peliharaan/detail-pengajuan-pengadopsian-hewan-peliharaan/ubah-pengajuan-pengadopsian-hewan-peliharaan/{adoption_form_id}', [FormAdopsiController::class, 'edit'])->name('formAdopsi.edit');

        Route::post('/edit-form-adopsi-post', [FormAdopsiController::class, 'editPost'])->name('formAdopsi.edit.post');
        Route::patch('/adopsi-is-seen/{id}/toggle', [FormAdopsiController::class, 'toggleIsSeen'])->name('formAdopsi.toggle.is_seen');
    });
    
    // REGION KONFIGURASI
    Route::prefix('konfigurasi')->group(function () {

        Route::get('/informasi-shelter', [InformasiShelterController::class, 'index'])->name('informasiShelter.index');
        Route::get('/informasi-shelter/ubah-informasi-shelter', [InformasiShelterController::class, 'edit'])->name('informasiShelter.edit');

        Route::post('/edit-informasi-shelter-post', [InformasiShelterController::class, 'editPost'])->name('informasiShelter.edit.post');

        Route::get('/daftar-pertanyaan-penyerahan', [PertanyaanPenyerahanController::class, 'index'])->name('pertanyaanPenyerahan.index');
        Route::get('/daftar-pertanyaan-penyerahan/ubah-pertanyaan-penyerahan', [PertanyaanPenyerahanController::class, 'edit'])->name('pertanyaanPenyerahan.edit');

        Route::post('/edit-handover-question-post', [PertanyaanPenyerahanController::class, 'editPost'])->name('pertanyaanPenyerahan.edit.post');
        Route::delete('/delete-handover-question/{id}', [PertanyaanPenyerahanController::class, 'deleteQuestion'])->name('pertanyaanPenyerahan.delete');

        Route::get('/daftar-pertanyaan-pengadopsian', [PertanyaanPengadopsianController::class, 'index'])->name('pertanyaanPengadopsian.index');
        Route::get('/daftar-pertanyaan-pengadopsian/ubah-pertanyaan-pengadopsian', [PertanyaanPengadopsianController::class, 'edit'])->name('pertanyaanPengadopsian.edit');

        Route::post('/edit-adoption-question-post', [PertanyaanPengadopsianController::class, 'editPost'])->name('pertanyaanPengadopsian.edit.post');
        // Route::delete('/delete-adoption-question/{id}', [PertanyaanPengadopsianController::class, 'deleteQuestion'])->name('pertanyaanPengadopsian.delete');
    });
});

// Route::post('/test-upload', [DataHewanController::class, 'testUploadGambar'])->name('animal.uploadGambar');

