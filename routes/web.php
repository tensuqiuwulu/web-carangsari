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
use App\Http\Controllers\Admin\ManagePeninggalanKunoController;
use App\Http\Controllers\Admin\ManageGalleryController;
use App\Http\Controllers\Admin\AuthController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/peninggalan-kuno/{id}', [PeninggalanKunoController::class, 'show'])->name('peninggalan_kuno.show');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('post.login');

//logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// admin routes
Route::middleware(['auth.custom'])->prefix('admin')->group(function () {

    Route::get('/sejarah', [ManageSejarahController::class, 'index'])->name('admin.sejarah.index');
    Route::post('/sejarah', [ManageSejarahController::class, 'store'])->name('admin.sejarah.store');

    Route::get('/denah', [ManageDenahController::class, 'index'])->name('admin.denah.index');
    Route::post('/denah', [ManageDenahController::class, 'store'])->name('admin.denah.store');

    Route::get('/berita', [ManageBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/berita/create', [ManageBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/berita', [ManageBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/berita/{id}/edit', [ManageBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::post('/berita/{id}', [ManageBeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/berita/{id}', [ManageBeritaController::class, 'destroy'])->name('admin.berita.destroy');

    Route::get('/peninggalan-kuno', [ManagePeninggalanKunoController::class, 'index'])->name('admin.peninggalan_kuno.index');
    Route::get('/peninggalan-kuno/create', [ManagePeninggalanKunoController::class, 'create'])->name('admin.peninggalan_kuno.create');
    Route::post('/peninggalan-kuno', [ManagePeninggalanKunoController::class, 'store'])->name('admin.peninggalan_kuno.store');
    Route::get('/peninggalan-kuno/{id}', [ManagePeninggalanKunoController::class, 'show'])->name('admin.peninggalan_kuno.show');
    Route::get('/peninggalan-kuno/{id}/edit', [ManagePeninggalanKunoController::class, 'edit'])->name('admin.peninggalan_kuno.edit');
    Route::post('/peninggalan-kuno/{id}', [ManagePeninggalanKunoController::class, 'update'])->name('admin.peninggalan_kuno.update');
    Route::delete('/peninggalan-kuno/{id}', [ManagePeninggalanKunoController::class, 'destroy'])->name('admin.peninggalan_kuno.destroy');

    Route::get('/gallery', [ManageGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/gallery/create', [ManageGalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/gallery', [ManageGalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/gallery/{id}', [ManageGalleryController::class, 'show'])->name('admin.gallery.show');
    Route::get('/gallery/{id}/edit', [ManageGalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::post('/gallery/{id}', [ManageGalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/gallery/{id}', [ManageGalleryController::class, 'destroy'])->name('admin.gallery.destroy');
});
