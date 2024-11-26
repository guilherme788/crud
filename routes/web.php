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

    Route::resource('presos', PresoController::class);
    Route::resource('celas', CelaController::class);
    Route::resource('visitas', VisitaController::class);
    Route::resource('visitantes', VisitanteController::class);
    Route::resource('comportamento', ComportamentoController::class);

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

require __DIR__ . '/auth.php';
