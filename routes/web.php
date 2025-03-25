<?php

use App\Models\Role;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HayoController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LiburController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\TapelController;
use App\Http\Controllers\KepsekController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\DashboardConroller;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardGuruController;
use App\Http\Controllers\DashboardKepsekController;
use App\Http\Controllers\RekapAbsenController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('isTamu');
Route::post('/login', [LoginController::class, 'ceklogin'])->name('ceklogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardConroller::class, 'index'])->name('admin.dashboard');
    Route::get('/kepsek/dashboard', [DashboardKepsekController::class, 'index'])->name('kepsek/dashboard');
});
Route::get('/data_admin',[AdminController::class, 'index'])->name('admin/data_admin')->middleware('isLogin');
Route::post('/tambah_admin', [AdminController::class, 'store'])->name('admins.store');
Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
Route::delete('/admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
Route::get('/kelola_absen', [TapelController::class, 'show']);

// buat guru
Route::get('/data_guru',[GuruController::class, 'index'])->middleware('isLogin');
Route::post('/tambah_guru', [GuruController::class, 'store'])->name('gurus.store');
Route::put('/gurus/{guru}', [GuruController::class, 'update'])->name('gurus.update');
Route::delete('/gurus/{guru}', [GuruController::class, 'destroy'])->name('gurus.destroy');

// buat kepsek
Route::get('/data_kepsek',[KepsekController::class, 'index'])->middleware('isLogin');
Route::put('/kepseks/{kepsek}', [KepsekController::class, 'update'])->name('kepseks.update');
Route::delete('/kepseks/{kepsek}',[KepsekController::class, 'destroy'])->name('kepseks.destroy');

// tapel
Route::get('/tapel',[TapelController::class, 'index'])->middleware('isLogin');
Route::resource('tapels', TapelController::class);

// libur
Route::get('/libur',[LiburController::class, 'index'])->middleware('isLogin');
Route::resource('liburs', LiburController::class);

// absen

Route::get('/admin/tabel_absen',[AbsenController::class, 'index'])->middleware('isLogin')->name('tabel_absen');
Route::post('/absen/store', [AbsenController::class, 'store'])->name('absens.store');
// Route::put('/absens/{id}', [AbsenController::class, 'update'])->name('absens.update');
// Route::delete('/absens/{id}', [AbsenController::class, 'destroy'])->name('absens.destroy');
// rekap
Route::get('/admin/rekap_absen', [RekapController::class, 'index'])->name('rekap_absen.index');

// halaman guru
Route::get('/guru/dashboard', [DashboardGuruController::class, 'index'])->name('guru/dashboard')->middleware('isLogin');
Route::get('/guru/absen',[QrCodeController::class, 'index'])->name('guru/absen')->middleware('isLogin');
Route::post('/absen',[QrCodeController::class, 'store'])->name('absen.store');

// halaman kepsek
Route::get('/kepsek/rekap_absen',[RekapAbsenController::class, 'index'])->name('rekap.index')->middleware('isLogin');


