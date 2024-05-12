<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\LoginController;



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

Route::get('/',function(){
    return view('welcome',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');

Route::resource('layanan',LayananController::class)->middleware('auth');
Route::resource('user',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');
Route::resource('pelanggan',PelangganController::class)->except('destroy')->middleware('auth');
Route::resource('suplier',SuplierController::class)->except('destroy')->middleware('auth');
Route::resource('teknisi',TeknisiController::class)->except('destroy')->middleware('auth');


Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');


Route::get('penjualan',function(){
    return view('penjualan.index',[
        "title"=>"Penjualan"
    ]);
})->name('penjualan')->middleware('auth');


Route::get('transaksi',function(){
    return view('penjualan.transaksis',[
        "title"=>"Transaksi"
    ]);
    })->middleware('auth');
    