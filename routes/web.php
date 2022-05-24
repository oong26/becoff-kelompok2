<?php

use App\Http\Controllers\Master\DaftarMenuController;
use App\Http\Controllers\Master\PemasukanController;
use App\Http\Controllers\Master\PesananController;
use App\Http\Controllers\Master\PengeluaranController;
use App\Http\Controllers\Master\RekapitulasiController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\CekKualitasController;
use App\Http\Controllers\Master\MejaController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('master')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('user', UserController::class);
        Route::resource('daftar-menu', DaftarMenuController::class);
        Route::resource('meja', MejaController::class);
        Route::resource('pemesanan', PesananController::class);
        Route::get('pemesanan/konfirmasi-pembayaran/{id}', [PesananController::class, 'konfirmasiPembayaran'])
            ->name('pemesanan.konfirmasi');
        Route::get('pemesanan/cancel/{id}', [PesananController::class, 'cancelOrder'])
            ->name('pemesanan.cancel');
        Route::get('pemesanan/print/{id}', [PesananController::class, 'print'])
            ->name('pemesanan.print');

        Route::prefix('keuangan')->group(function () {
            Route::get('pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
            Route::resource('pengeluaran', PengeluaranController::class);
            Route::get('rekapitulasi', [RekapitulasiController::class, 'index'])->name('rekapitulasi.index');
        });

        // Route::get('lupa-password', [UserController::class, 'index'])->name('lupa-password.index');
        // Route::put('lupa-password', [UserController::class, 'changePassword'])->name('lupa-password.change');

        Route::get('cek-kualitas', [CekKualitasController::class, 'index'])->name('cek-kualitas.index');
        Route::get('cek-kualitas/create', [CekKualitasController::class, 'create'])->name('cek-kualitas.create');
        Route::post('cek-kualitas', [CekKualitasController::class, 'store'])->name('cek-kualitas.store');
        Route::delete('cek-kualitas/{id}', [CekKualitasController::class, 'destroy'])->name('cek-kualitas.destroy');
    });
});

Route::get('lupa-password', [UserController::class, 'indexPassword'])->name('lupa-password.index');
Route::put('lupa-password', [UserController::class, 'changePassword'])->name('lupa-password.change');


require __DIR__ . '/auth.php';
