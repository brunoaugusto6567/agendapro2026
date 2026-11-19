<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Usuários autenticados e ativos
Route::middleware(['auth', 'active'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Contatos
    Route::resource('contacts', ContactController::class);
});

// Somente administradores
Route::middleware(['auth', 'active', 'is_admin'])->group(function () {

    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');

    Route::patch('/admin/users/{user}/toggle', [AdminController::class, 'toggleStatus'])
        ->name('admin.users.toggle');
});

require __DIR__.'/auth.php';