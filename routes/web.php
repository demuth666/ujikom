<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\KunjunganController;

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

// Route::get('/', function () {
//     return view('auth/login');
// });

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('proses_login', 'App\Http\Controllers\AuthController@proses_login')->name('proses_login');
Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_login:admin']], function () {
        //Rekam Medis 
        Route::get('RekamMedis', [RekamController::class, 'index'])->name('rekam.medis');
        Route::get('RekamMedis/add', [RekamController::class, 'create'])->name('rekam.medis.add');
        Route::post('RekamMedis/store', [RekamController::class, 'store'])->name('rekam.medis.store');
        Route::get('RekamMedis/edit/{id}', [RekamController::class, 'edit'])->name('rekam.medis.edit');
        Route::put('RekamMedis/update/{id}', [RekamController::class, 'update'])->name('rekam.medis.update');
        Route::delete('/RekamMedis/{id}', [RekamController::class, 'destroy'])->name('destroy.rekam.medis');
        //Dokter Controller
        Route::get('Dokter', [DokterController::class, 'index'])->name('dokter');
        Route::get('Dokter/add', [DokterController::class, 'create'])->name('add.dokter');
        Route::post('Dokter/store', [DokterController::class, 'store'])->name('store.dokter');
        Route::get('/Dokter/edit/{id}', [DokterController::class, 'edit'])->name('edit.dokter');
        Route::put('/Dokter/update/{id}', [DokterController::class, 'update'])->name('update.dokter');
        Route::delete('/Dokter/{id}', [DokterController::class, 'destroy'])->name('destroy.dokter');
        //Pasien Controller
        Route::get('Pasien', [PasienController::class, 'index'])->name('pasien');
        Route::get('Pasien/Search', [PasienController::class, 'search'])->name('search.pasien');
        Route::get('Pasien/add', [PasienController::class, 'create'])->name('add.pasien');
        Route::post('Pasien/store', [PasienController::class, 'store'])->name('store.pasien');
        Route::get('Pasien/edit/{id}', [PasienController::class, 'edit'])->name('edit.pasien');
        Route::put('/Pasien/update/{id}', [PasienController::class, 'update'])->name('update.pasien');
        Route::delete('/Pasien/{id}', [PasienController::class, 'destroy'])->name('destroy.pasien');
        //Tindakan Controller
        Route::get('Tindakan', [TindakanController::class, 'index'])->name('tindakan');
        Route::get('Tindakan/Search', [TindakanController::class, 'search'])->name('search.tindakan');
        Route::get('Tindakan/add', [TindakanController::class, 'create'])->name('add.tindakan');
        Route::post('Tindakan/store', [TindakanController::class, 'store'])->name('store.tindakan');
        Route::get('Tindakan/edit/{id}/', [TindakanController::class, 'edit'])->name('edit.tindakan');
        Route::put('/Tindakan/update/{id}', [TindakanController::class, 'update'])->name('update.tindakan');
        Route::delete('/Tindakan/{id}', [TindakanController::class, 'destroy'])->name('destroy.tindakan');
        //Obat Controller
        Route::get('Obat', [ObatController::class, 'index'])->name('obat');
        Route::get('Obat/Search', [ObatController::class, 'search'])->name('search.obat');
        Route::get('Obat/add', [ObatController::class, 'create'])->name('add.obat');
        Route::post('Obat/store', [ObatController::class, 'store'])->name('store.obat');
        Route::get('Obat/edit/{id}', [ObatController::class, 'edit'])->name('edit.obat');
        Route::put('Obat/update/{id}', [ObatController::class, 'update'])->name('update.obat');
        Route::delete('/Obat/{id}', [ObatController::class, 'destroy'])->name('destroy.obat');
        //Poli Controller
        Route::get('Poli', [PoliController::class, 'index'])->name('poli');
        Route::get('Poli/Search', [PoliController::class, 'search'])->name('search.poli');
        Route::get('Poli/add', [PoliController::class, 'create'])->name('add.poli');
        Route::post('Poli/store', [PoliController::class, 'store'])->name('store.poli');
        Route::get('Poli/edit/{id}', [PoliController::class, 'edit'])->name('edit.poli');
        Route::put('Poli/update/{id}', [PoliController::class, 'update'])->name('update.poli');
        Route::delete('/Poli/{id}', [PoliController::class, 'destroy'])->name('destroy.poli');
        //Lab Controller
        Route::get('Lab', [LabController::class, 'index'])->name('lab');
        Route::get('Lab/Search', [LabController::class, 'search'])->name('search.lab');
        Route::get('Lab/add', [LabController::class, 'create'])->name('add.lab');
        Route::post('Lab/store', [LabController::class, 'store'])->name('store.lab');
        Route::get('Lab/edit/{id}', [LabController::class, 'edit'])->name('edit.lab');
        Route::put('Lab/update/{id}', [LabController::class, 'update'])->name('update.lab');
        Route::delete('/Lab/{id}', [LabController::class, 'destroy'])->name('destroy.lab');
        //Kunjungan Controller
        Route::get('Kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
        Route::get('Kunjungan/Search', [KunjunganController::class, 'search'])->name('search.kunjungan');
        Route::get('Kunjungan/add', [KunjunganController::class, 'create'])->name('add.kunjungan');
        Route::post('Kunjungan/store', [KunjunganController::class, 'store'])->name('store.kunjungan');
        Route::get('Kunjungan/edit/{id}', [KunjunganController::class, 'edit'])->name('edit.kunjungan');
        Route::put('Kunjungan/update/{id}', [KunjunganController::class, 'update'])->name('update.kunjungan');
        Route::delete('/Kunjungan/{id}', [KunjunganController::class, 'destroy'])->name('destroy.kunjungan');
    });
    // Route::group(['middleware' => ['cek_login:editor']], function () {
    //     Route::resource('editor', AdminController::class);
    // });
});
