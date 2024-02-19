<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboardcontroller;
use App\Http\Controllers\JenisPelayananController;
use App\Http\Controllers\landingpageController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\NewbabiesController;
use App\Http\Controllers\newsbabiesController;
use App\Http\Controllers\NewsbabiesController as AppNewsbabiesController;
use App\Http\Controllers\NewsbabiesController as AppHttpNewsbabiesController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

/*ADMIN & OPERATOR*/
Route::middleware(['akses:admin,operator'])->group(function () {

/*Dashboard*/
    Route::get('/dashboard', [Dashboardcontroller::class, 'index']);

    /*crud*/
    Route::get('/dataanak', [AnakController::class, 'index'])->name('indexanak');
    Route::post('/dataanak/tambah', [AnakController::class, 'store']);
    Route::post('/dataanak/edit', [AnakController::class, 'edit']);
    Route::post('/dataanak/update', [AnakController::class, 'update']);
    Route::delete('/dataanak/hapus', [AnakController::class, 'hapus']);
    Route::get('/dataanak/detail', [AnakController::class, 'detail'])->name('dataanak.detail');
    Route::get('/dataanak/cetak', [AnakController::class, 'cetak']);
    // jenis pelayanan//
    Route::get('/jenispelayanan', [JenisPelayananController::class, 'index'])->name('indexjenis');
    Route::post('/jenispelayanan/tambah', [JenisPelayananController::class, 'store']);
    Route::delete('/jenispelayanan/hapus', [JenisPelayananController::class, 'hapus']);
    
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
    Route::get('/pemeriksaan/cetak/{id}', [PemeriksaanController::class, 'cetak']);
    
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('akses:admin');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});


//NEWBABIES
route::get('/newsbabies', [NewbabiesController::class, 'index']);
route::get('/riwayat-pemeriksaan', [PemeriksaanController::class, 'riwayat']);


/*landingpage*/

Route::get('/landingpage', [landingpageController::class, 'index']);

Route::get('/landingpage', [landingpageController::class, 'index']);


//profile
route::get('/profile', [ProfileController::class, 'index'])->middleware('akses:warga');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

// Middlewqare tambahin ->middleware('akses:admin,op')

