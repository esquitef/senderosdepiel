<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BolsaController;
use App\Http\Controllers\AdminBolsaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BolsaController::class, 'index']);
Route::get('/secciones', [BolsaController::class, 'secciones']);
Route::get('/secciones/{categoria}', [BolsaController::class, 'categoria']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/crear', [AdminBolsaController::class, 'create']);

Route::post('/bolsas', [AdminBolsaController::class, 'store'])
->name('bolsas.store');

Route::get('/admin', [AdminBolsaController::class, 'index']);
Route::resource('bolsas', AdminBolsaController::class);

});

require __DIR__.'/auth.php';