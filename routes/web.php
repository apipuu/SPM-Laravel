<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Peminjam\BukuController;
use App\Http\Controllers\Peminjam\data_keanggotaan_controller;
use App\Http\Controllers\Peminjam\PeminjamanController;
use App\Http\Controllers\Peminjam\Laporan;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/pelaporan', function() {
    return view('laporan.create');
})->name('pelaporan')->middleware(['auth', 'role:pengunjung']);

Route::get('/peminjaman', function() {
    return view('data_peminjaman.create');
})->name('peminjaman')->middleware(['auth', 'role:pengunjung']);

Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('data-peminjaman', \App\Http\Controllers\PeminjamanController::class)->except(['show']);

Route::get('data_keanggotaan/cetakdatakeanggotaan', [App\Http\Controllers\data_keanggotaan_controller::class, 'document'])->middleware(['auth', 'role:admin']);
Route::resource('data_keanggotaan', \App\Http\Controllers\data_keanggotaan_controller::class)->middleware(['auth', 'role:admin']);
Route::get('buku/cetakdatabuku', [App\Http\Controllers\BukuController::class, 'document'])->middleware(['auth', 'role:admin']);        
Route::resource('buku', \App\Http\Controllers\BukuController::class)->except(['show']);
Route::get('pengunjung/buku', [App\Http\Controllers\BukuController::class, 'indexpengunjung'])->middleware(['auth', 'role:pengunjung']);  
Route::resource('laporan', \App\Http\Controllers\LaporanController::class)->except(['show']);

Route::get('/create', 'PeminjamanController@create')->middleware(['auth', 'role:pengunjung']);
Route::post('/store', 'PeminjamanController@store')->middleware(['auth', 'role:pengunjung']);

Route::get('/create', 'LaporanController@create')->middleware(['auth', 'role:pengunjung']);
Route::post('/store', 'LaporanController@store')->middleware(['auth', 'role:pengunjung']);

Route::get('/create', 'BukuController@create');
Route::post('/store', 'BukuController@store');

Route::get('/create', 'data_keanggotaan_controller@create');
Route::post('/store', 'data_keanggotaan_controller@store');

// Route::get('sending-queue-emails', function(){$details['email'] = 'afifulutfianto@gmail.com';
//     dispatch(new App\Jobs\TestSendEmail($details));
//     return response()->json(['message'=>'Mail Send Success!']);
// });
// [App\Http\Controllers\TestQueueEmails::class,'sendTestEmails'])->name('emailsend');
// Route::get('/transaksi', [App\Http\Controllers\PeminjamanController::class, 'create']);
// Route::post('/transaksi/store', [App\Http\Controllers\PeminjamanController::class, 'store']);
