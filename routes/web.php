<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ViewController;
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

Route::get('/', [ViewController::class, 'index']);

Route::group(['middleware'=> ['auth', 'checkrole:admin,staff']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/buku', BukuController::class);
    Route::get('/all', [BukuController::class, 'all_book']);
    Route::resource('/pinjam', PinjamController::class);
    Route::get('/report{id}', [PinjamController::class, 'generate']);
    Route::get('/report/all', [PinjamController::class, 'all']);
    Route::get('/user', [LoginController::class, 'index']);
    Route::resource('/petugas', PetugasController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Route::group(['middleware'=> ['auth', 'checkrole:user,admin,staff']], function(){
    Route::get('/listbook', [BukuController::class, 'listbook'])->name('listbook');
    Route::get('listbook/fiksi', [BukuController::class, 'fiksi'])->name('listbook.fiksi');
    Route::get('listbook/non-fiksi', [BukuController::class, 'non'])->name('listbook.non');
    Route::resource('/koleksi', KoleksiController::class);
    Route::resource('/rating', RatingController::class);
    Route::get('listbook/detail{id}', [BukuController::class, 'detailbook']);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/password', [LoginController::class, 'change_password'])->name('change.password');
    Route::post('/password', [LoginController::class, 'update_password'])->name('update.password');
});
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/register', [LoginController::class, 'create'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.action');





