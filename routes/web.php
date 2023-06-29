<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatauserController;
use App\Http\Controllers\VisualisasiController;

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

//Route Register
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

//Route Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

//Route Dashboard
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//Route User
Route::get('user', [DatauserController::class, 'index'])->name('user')->middleware('auth');
Route::get('usertambah', [DatauserController::class, 'tambahuser'])->name('tambahuser')->middleware('auth');
Route::patch('actionsimpanuser', [DatauserController::class, 'actionsimpanuser'])->name('actionsimpanuser')->middleware('auth');
Route::get('useredit-{id_user}', [DatauserController::class, 'edituser'])->name('edituser')->middleware('auth');
Route::patch('actionupdateuser', [DatauserController::class, 'actionupdateuser'])->name('actionupdateuser')->middleware('auth');
Route::patch('actionhapususer', [DatauserController::class, 'actionhapususer'])->name('actionhapususer')->middleware('auth');

Route::get('banyakjenisusaha', [VisualisasiController::class, 'banyakjenisusaha'])->name('banyakjenisusaha')->middleware('auth');
Route::get('banyakkecamatanjenisusaha', [VisualisasiController::class, 'banyakkecamatanjenisusaha'])->name('banyakkecamatanjenisusaha')->middleware('auth');
Route::get('banyakwilayahjenisusaha', [VisualisasiController::class, 'banyakwilayahjenisusaha'])->name('banyakwilayahjenisusaha')->middleware('auth');
Route::get('sebaranjenisusahakecamatan', [VisualisasiController::class, 'sebaranjenisusahakecamatan'])->name('sebaranjenisusahakecamatan')->middleware('auth');
Route::get('sebarankecamatanjenisusaha', [VisualisasiController::class, 'sebarankecamatanjenisusaha'])->name('sebarankecamatanjenisusaha')->middleware('auth');
Route::get('sebaranjenisusahawilayah', [VisualisasiController::class, 'sebaranjenisusahawilayah'])->name('sebaranjenisusahawilayah')->middleware('auth');


