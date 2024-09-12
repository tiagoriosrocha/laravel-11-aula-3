<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtividadeController;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\QuadroController;
use App\Http\Controllers\StatusController;



///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

Route::get('/atividades/create',      [AtividadeController::class, 'create']);
Route::post('/atividades',            [AtividadeController::class, 'store']);
Route::get('/atividades',             [AtividadeController::class, 'index']);
Route::get('/atividades/{id}',        [AtividadeController::class, 'show']);
Route::get('/atividades/{id}/edit',   [AtividadeController::class, 'edit']);
Route::put('/atividades/{id}',        [AtividadeController::class, 'update']);
Route::get('/atividades/{id}/delete', [AtividadeController::class, 'delete']);
Route::delete('/atividades/{id}',     [AtividadeController::class, 'destroy']);

///////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
