<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SejarahController;
use App\Http\Controllers\Web\DenahController;
use App\Http\Controllers\Web\BeritaController;
use App\Http\Controllers\Web\PeninggalanKunoController;
use App\Http\Controllers\Web\GalleryController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');
Route::get('/denah', [DenahController::class, 'index'])->name('denah');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/peninggalan-kuno', [PeninggalanKunoController::class, 'index'])->name('peninggalan_kuno');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

