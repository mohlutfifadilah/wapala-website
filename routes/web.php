<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ProfilController;

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
    return view('main', [ 'segment' => $segment ] );
});

Route::get('/login', [LoginController::class, 'index']);

Route::resource('profil', ProfilController::class);
Route::resource('galeri', GaleriController::class);
Route::resource('kontak', KontakController::class);

Route::get('/dashboard',  [DashboardController::class, 'index']);

Route::post('/login', [LoginController::class, 'login'])->name('login');
