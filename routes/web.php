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

Route::resource('users', \App\Http\Controllers\UserController::class)
    ;


Route::get('data_keanggotaan/cetakdatakeanggotaan', [App\Http\Controllers\data_keanggotaan_controller::class, 'document']);
Route::resource('data_keanggotaan', \App\Http\Controllers\data_keanggotaan_controller::class)
    ;
Route::get('buku/cetakdatabuku', [App\Http\Controllers\BukuController::class, 'document']);        
Route::resource('buku', \App\Http\Controllers\BukuController::class)->except(['show'])->middleware('auth');
