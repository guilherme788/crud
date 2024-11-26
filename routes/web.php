<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresoController;
use App\Http\Controllers\CelaController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ComportamentoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para *-*/
    Route::resource('presos', PresoController::class);

    // Rotas para Celas
    Route::resource('celas', CelaController::class);

    // Rotas para Visitas
    Route::resource('visitas', VisitaController::class);

    // Rotas para Visitantes
    Route::resource('visitantes', VisitanteController::class);

    // Rotas para Comportamento
    Route::resource('comportamento', ComportamentoController::class);

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

require __DIR__ . '/auth.php';
