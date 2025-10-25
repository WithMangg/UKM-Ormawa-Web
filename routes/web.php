<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UkmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ChoirRegistrationController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\RekomawaController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\RecMawaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Auth\PasswordController;

use App\Http\Controllers\AboutOrganisasiController;
use App\Http\Controllers\KegiatanUKMController;
use App\Http\Controllers\AboutOrmawaController;
use App\Http\Controllers\KegiatanOrmawaController;


Route::get('/', [BeritaController::class, 'show']);

Route::get('/about', [FrontController::class, 'about']);
Route::get('/about/{id}', [FrontController::class, 'detail'])->name('pages.detail');

Route::get('/contact', [FrontController::class, 'contact']);

Route::get('/forum', [FrontController::class, 'forum']);

Route::get('/rekomendasi', [FrontController::class, 'rekomendasi']);

Route::get('/ormawa-rekomendasi', [FrontController::class, 'ormawa_rekom']);

Route::get('/recruitment', [FrontController::class, 'recruitment'])->name('recruitment');

Route::get('/padus', [FrontController::class, 'padus']);

Route::get('/news/{id}', [FrontController::class, 'news'])->name('info-berita');

Route::get('/riwayat_pendaftaran', [RecruitmentController::class, 'riwayat'])->name('ukm.Riwayat_pendaftaran');
route::post('/recruitment/register', [RecruitmentController::class, 'store'])->name('recruitment.register');
// Route::get('/pendaftaran_ormawa', [RecruitmentController::class, 'index_ormawa'])->name('ormawa.Riwayat_pendaftaran');

Route::get('/history', [UserController::class, 'riwayat'])->name('user.Riwayat_pendaftaran');

Route::get('/register', [FrontController::class, 'register'])->name('register');

route::get('/opsi', [FrontController::class, 'opsi'])->name('opsi');

route::get('/daftar-anggota', [AnggotaController::class, 'show'])->name('daftar_anggota');
route::post('/tambah-anggota', [AnggotaController::class, 'add'])->name('tambah_anggota');
route::put('/edit-anggota', [AnggotaController::class, 'update'])->name('edit_anggota');
Route::delete('/hapus-anggota', [AnggotaController::class, 'delete'])->name('hapus_anggota');

Route::get('/recmawa', [RecMawaController::class, 'riwayat'])->name('ormawa.Riwayat_pendaftaran');
route::post('/recmawa-store', [RecMawaController::class, 'store'])->name('recmawa.store');

Route::post('/choir/register', [ChoirRegistrationController::class, 'store'])->name('choir.register');

Route::post('/get-recommendations', [RecommendationController::class, 'match'])->name('recommendations.match');
Route::get('/show-recommendations', [RecommendationController::class, 'show'])->name('list.recomendation');

Route::get('/recommendation', [RecommendationController::class, 'index'])->name('ukm.recomendation');
Route::get('/recommendation-ormawa', [RecommendationController::class, 'ormawa'])->name('ormawa.recomendation');
Route::post('/admin/store', [RecommendationController::class, 'storeAdmin']);
Route::get('/show-recmawa', [RecmawaController::class, 'show'])->name('list.recmawa');

Route::post('/add-rekomawa', [RekomawaController::class, 'add']);
Route::post('/get-rekomawa', [RekomawaController::class, 'match']);

Route::put('/password', [PasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');

Route::middleware(['auth', 'can:manage ukm'])->group(function () {
    Route::resource('ukm', UkmController::class);
    Route::get('/recommendation/{id}/edit', [RecommendationController::class, 'edit'])->name('recommendation.edit');
    Route::put('/recommendation/{id}', [RecommendationController::class, 'update'])->name('recommendation.update');
    Route::resource('abouts', AboutOrganisasiController::class);
    Route::resource('kegiatanukm', KegiatanUKMController::class);
});

Route::middleware(['auth', 'can:manage ormawa'])->group(function () {
    Route::resource('ormawa', OrmawaController::class);
    Route::get('/recmawa/show', [RecMawaController::class, 'show'])->name('recmawa.show');
Route::get('/recmawa/{id}/edit', [RecMawaController::class, 'edit']);
Route::put('/recmawa/{id}', [RecMawaController::class, 'update'])->name('recmawa.update');

    Route::resource('tentangkami', AboutOrmawaController::class);
    Route::resource('kegiatanormawa', KegiatanOrmawaController::class);    
});

 Route::middleware(['auth', 'can: manage pengguna'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('berita', BeritaController::class);
 });
 
Route::get('/dashboard', [AnggotaController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
