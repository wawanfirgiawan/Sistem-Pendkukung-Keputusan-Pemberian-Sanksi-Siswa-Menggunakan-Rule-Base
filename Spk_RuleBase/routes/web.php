<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanPelanggaranController;
use App\Http\Controllers\LaporanSanksiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RuleTatibController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TatibController;
use App\Http\Controllers\UserController;
use App\Models\LaporanSanksi;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('landingPage');
});

Route::get('/User/Daftar', [RegisterController::class, 'index'])->name('Daftar');
Route::post('/regis/store', [RegisterController::class, 'store'])->name('register-store');
Route::post('/admin/registrations/approve/{id}', [RegisterController::class, 'approve'])->name('admin.approve');
Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user/GantiPassword', [UserController::class, 'ubahPassword'])->name('user-ganti');
    Route::post('/user/updatepassword', [UserController::class, 'updatePassword'])->name('update-password');
});

Route::middleware(['auth', 'CheckRole:siswa,guru'])->group(function () {
    Route::get('/laporan-pelanggaran/create', [LaporanPelanggaranController::class, 'create'])->name('lappel-create');
    Route::post('/laporan-pelanggaran/store', [LaporanPelanggaranController::class, 'store'])->name('lappel-store');
    Route::get('/laporan-pelanggaran/hasil/{id}', [LaporanPelanggaranController::class, 'hasil'])->name('lappel-hasil');
});

Route::middleware(['auth', 'CheckRole:siswa'])->group(function () {
    Route::get('/tata-tertib/siswa', [TatibController::class, 'indexsiswa'])->name('tatib-siswa');
});

Route::middleware(['auth', 'CheckRole:siswa,ortu'])->group(function () {
    Route::get('/riwayat-pelanggaranku/siswa', [RiwayatController::class, 'riwayatSiswa'])->name('riwayat-siswa');
});

Route::middleware(['auth', 'CheckRole:guru'])->group(function () {
    Route::get('/riwayat-pelanggaran-semua/siswa', [RiwayatController::class, 'riwayatsiswaall'])->name('riwayat-siswa-semua');
});

Route::middleware(['auth', 'CheckRole:bk,operator,superAdmin'])->group(function () {
    Route::get('/kelas/index', [KelasController::class, 'index'])->name('kelas-index');
    Route::get('/siswa/index', [SiswaController::class, 'index'])->name('siswa-index');

    // route tatib
    Route::get('/tata-tertib/index', [TatibController::class, 'index'])->name('tatib-index');
    Route::post('/tata-tertib/store', [TatibController::class, 'store'])->name('tatib-store');
    Route::delete('/tata-tertib/delete/{id}', [TatibController::class, 'destroy'])->name('tatib-delete');

    // route sanksi
    Route::get('/sanksi-pelanggaran/index', [SanksiController::class, 'index'])->name('sanksi-index');
    Route::post('/sanksi-pelanggaran/store', [SanksiController::class, 'store'])->name('sanksi-store');
    Route::delete('/sanksi-pelanggaran/delete/{id}', [SanksiController::class, 'destroy'])->name('sanksi-delete');
});

Route::middleware(['auth', 'CheckRole:bk,superAdmin'])->group(function () {
    Route::get('/laporan-pelanggaran/index', [LaporanPelanggaranController::class, 'index'])->name('lappel-index');
    Route::post('/laporan/toggle-read', [LaporanPelanggaranController::class, 'toggleRead'])->name('laporan.toggleRead');
    Route::delete('/laporan-pelanggaran/delete/{id}', [LaporanPelanggaranController::class, 'destroy'])->name('lappel-delete');

    Route::get('/riwayat-pelanggaran/index', [RiwayatController::class, 'selectcounthistory'])->name('riwayat-select');
    Route::post('/riwayat-pelanggaran/store', [RiwayatController::class, 'store'])->name('riwayat-store');
    Route::delete('/riwayat-pelanggaran/delete/{id}', [RiwayatController::class, 'destroy'])->name('riwayat-delete');
    Route::get('/selectSiswa', [RiwayatController::class, 'selectsiswa'])->name('selectsiswa');
    Route::get('/selectTatib', [RiwayatController::class, 'selecttatib'])->name('selecttatib');
    Route::get('/riwayat/detail-history/{siswa_id}/{id}', [RiwayatController::class, 'detailhistory'])->name('riwayat-detail');
    Route::post('/riwayat/sanksi-store/{siswa_id}', [RiwayatController::class, 'postSanksi1'])->name('postSanksi');
    Route::post('/riwayat/akumulasi/{siswa_id}', [RiwayatController::class, 'akumulasiTatib'])->name('akumulasi');


    // route RuleTatib
    Route::get('/rule_Tata-terib/index', [RuleTatibController::class, 'index'])->name('rule-index');
    Route::post('/rule_Tata-terib/store', [RuleTatibController::class, 'store'])->name('rule-store');
    Route::delete('/rule_Tata-terib/delete/{id}', [RuleTatibController::class, 'destroy'])->name('rule-delete');

    // route laporan sanksi
    Route::delete('/laporan-sanksi/delete/{id}', [LaporanSanksiController::class, 'destroy'])->name('laporan_sanksi-delete');
});

Route::middleware(['auth', 'CheckRole:bk,superAdmin,kepsek'])->group(function () {
    Route::get('/laporan-sanksi/pdf', [LaporanSanksiController::class, 'PdfDataSanksi'])->name('pdf-dataLaporanSanksi');
});

Route::middleware(['auth', 'CheckRole:bk,ortu,superAdmin,kepsek'])->group(function () {
    Route::get('/laporan-sanksi/index', [LaporanSanksiController::class, 'index'])->name('laporan_sanksi-index');
    Route::get('/laporan-sanksi/pdf/{id}', [LaporanSanksiController::class, 'export'])->name('laporan_sanksi-pdf');
});

Route::middleware(['auth', 'CheckRole:operator,superAdmin'])->group(function () {
    // route kelas
    Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas-store');
    Route::delete('/kelas/delete/{id}', [KelasController::class, 'destroy'])->name('kelas-delete');
    // route siswa
    Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa-store');
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa-delete');
    // route user
    Route::get('/user/create', [UserController::class, 'create'])->name('user-create');
    Route::get('/user/index', [UserController::class, 'index'])->name('user-index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user-store');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user-delete');
});

