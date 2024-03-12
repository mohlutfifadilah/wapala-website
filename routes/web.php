<?php

use App\Http\Controllers\AngkatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProfilController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Models\Divisi;

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
    $segment = Request::segment(1);
    if ($segment===null){
        $segment = 'beranda';
    }

    $divisi = Divisi::all();
    return view('main', [ 'segment' => $segment,
                          'divisi' => $divisi
                          ] );
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('profil', ProfilController::class);
Route::resource('kontak', KontakController::class);

# Admin
Route::get('/dashboard',  [DashboardController::class, 'index']);
Route::resource('user', UserController::class);
Route::resource('divisi', DivisiController::class);
Route::resource('status', StatusController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('angkatan', AngkatanController::class);
Route::resource('galeri', GaleriController::class);

