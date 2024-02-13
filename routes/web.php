<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\JenisPelayananController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PemeriksaanController;
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

//Route::get('/', function () {
    //return view('welcome');
//});
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'logincheck']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registercheck']);

/*Dashboard*/
Route::get('/dashboard', [Dashboardcontroller::class, 'index']);

/*login*/
Route::get('auth/login', [AuthController::class, 'index']);

Route::get('auth/login', [AuthController::class, 'index'])->name('login');

/*landingpage*/

Route::get('/landingpage', [landingpageController::class, 'index']);

Route::get('/landingpage', [landingpageController::class, 'index']);

/*crud*/
 Route::get('/dataanak', [AnakController::class, 'index'])->name('indexanak');
 Route::post('/dataanak/tambah', [AnakController::class, 'store']);
 Route::post('/dataanak/edit', [AnakController::class, 'edit']);
 Route::post('/dataanak/update', [AnakController::class, 'update']);
 Route::delete('/dataanak/hapus', [AnakController::class, 'hapus']);
 Route::get('/dataanak/detail', [AnakController::class, 'detail'])->name('dataanak.detail');

// jenis pelayanan//
Route::get('/jenispelayanan', [JenisPelayananController::class, 'index'])->name('indexjenis');
Route::post('/jenispelayanan/tambah', [JenisPelayananController::class, 'store']);
Route::delete('/jenispelayanan/hapus', [JenisPelayananController::class, 'hapus'])->name('jenispelayanan.hapus');

//edit
route::get('/dataanak', [AnakController::class, 'index'])->name('indexanak');
// route::post('/dataanak', [AnakController::class, 'edit'])->name('edit');

//hapus
// route::post('dataanak',[AnakController::class, 'hapus'])->name('hapus');
// Route::get('/dataanak/hapus/{id}', [AnakController::class, 'destroy']);

//log
route::get('/log', [LogsController::class, 'index'])->name('index');

//PEMERIKSAAN
// Route::get('pemeriksaan', [PemeriksaanController::class, 'index'])->name('index');
// Route::post('/pemeriksaan/tambah', [PemeriksaanController::class, 'store']);
Route::get('/pemeriksaan', [PemeriksaanController::class, 'index']);
Route::post('/pemeriksaan/tambah', [PemeriksaanController::class, 'store']);
Route::post('/pemeriksaan/edit', [PemeriksaanController::class, 'edit']);
Route::post('/pemeriksaan/update', [PemeriksaanController::class, 'update']);
Route::get('/pemeriksaan/detail', [PemeriksaanController::class, 'detail']);
Route::delete('/pemeriksaan/hapus', [PemeriksaanController::class, 'hapus']);