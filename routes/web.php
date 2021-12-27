<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\PesananController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;

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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'ceklogin']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/registrasi', [RegisterController::class,'index'])->middleware('guest');
Route::post('/registrasi',[RegisterController::class,'store']);

Route::get('/daftarpesan-user', function () {
    return view('pemesanan.daftarpesan');
})->middleware('auth');

Route::get('/daftarpesan-admin', function () {
    return view('pemesanan.daftarpesan');
})->middleware(['auth','test_admin']);

Route::get('/about', function () {
    return view('about');
});


// Route::get('/pesanjasa', function () {
//     return view('pemesanan.pesanjasa');
// })->middleware('auth');

Route::resource('/pesanans', PesananController::class)->middleware('auth');

Route::resource('/testimonis', TestimoniController::class)->middleware('auth');


Route::get('/laporans', [LaporanController::class,'index'])->middleware('auth','test_admin');

Route::post('/laporans/list', [LaporanController::class,'laporanlist'])->middleware('auth','test_admin');

Route::post('/laporans/detil', [LaporanController::class,'laporandetil'])->middleware('auth','test_admin');

Route::post('/laporans/pendapatan', [LaporanController::class,'laporanperforma'])->middleware('auth','test_admin');

