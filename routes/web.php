<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home');

Route::get('/pelaporan', function() {
    return view('laporan.create');
})->name('pelaporan');

Route::resource('users', \App\Http\Controllers\UserController::class);
Route::resource('data_peminjaman', \App\Http\Controllers\PeminjamanController::class);
Route::get('data_keanggotaan/cetakdatakeanggotaan', [App\Http\Controllers\data_keanggotaan_controller::class, 'document']);
Route::resource('data_keanggotaan', \App\Http\Controllers\data_keanggotaan_controller::class);
Route::get('buku/cetakdatabuku', [App\Http\Controllers\BukuController::class, 'document']);        
Route::resource('buku', \App\Http\Controllers\BukuController::class)->except(['show'])->middleware('auth');
Route::resource('laporan', \App\Http\Controllers\LaporanController::class)->except(['show'])->middleware('auth');

Route::get('/create', 'LaporanController@create');
Route::post('/store', 'LaporanController@store');

Route::get('/create', 'BukuController@create');
Route::post('/store', 'BukuController@store');

Route::get('/create', 'data_keanggotaan_controller@create');
Route::post('/store', 'data_keanggotaan_controller@store');

Route::get('sending-queue-emails', [App\Http\Controllers\TestQueueEmails::class,'sendTestEmails']);

// Route::get('/transaksi', [App\Http\Controllers\PeminjamanController::class, 'create']);
// Route::post('/transaksi/store', [App\Http\Controllers\PeminjamanController::class, 'store']);
