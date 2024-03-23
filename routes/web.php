<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\SejarahController;
use App\Http\Controllers\Web\DenahController;
use App\Http\Controllers\Web\BeritaController;
use App\Http\Controllers\Web\PeninggalanKunoController;
use App\Http\Controllers\Web\GalleryController;

use App\Http\Controllers\Admin\ManageSejarahController;
use App\Http\Controllers\Admin\ManageDenahController;
use App\Http\Controllers\Admin\ManageBeritaController;


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

// web routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sejarah', [SejarahController::class, 'index'])->name('sejarah');
Route::get('/denah', [DenahController::class, 'index'])->name('denah');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/peninggalan-kuno', [PeninggalanKunoController::class, 'index'])->name('peninggalan_kuno');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// admin routes
Route::prefix('admin')->group(function () {

    Route::get('/sejarah', [ManageSejarahController::class, 'index'])->name('admin.sejarah.index');
    Route::post('/sejarah', [ManageSejarahController::class, 'store'])->name('admin.sejarah.store');

    Route::get('/denah', [ManageDenahController::class, 'index'])->name('admin.denah.index');
    Route::post('/denah', [ManageDenahController::class, 'store'])->name('admin.denah.store');

    Route::get('/berita', [ManageBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [ManageBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [ManageBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [ManageBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/berita/{id}', [ManageBeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{id}', [ManageBeritaController::class, 'destroy'])->name('admin.berita.destroy');
});