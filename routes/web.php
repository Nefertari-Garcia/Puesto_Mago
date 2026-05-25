<?php

use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;

Route::get('/', function () {
    return redirect()->route('ventas.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/ventas', [ventaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [ventaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [ventaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/{venta}', [ventaController::class, 'show'])->name('ventas.show');
    Route::get('/ventas/{venta}/edit', [ventaController::class, 'edit'])->name('ventas.edit');
    Route::patch('/ventas/{venta}', [ventaController::class, 'update'])->name('ventas.update');
    Route::delete('/ventas/{venta}', [ventaController::class, 'destroy'])->name('ventas.destroy');
    Route::delete('/logout', [SessionsController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
});

Route::get('/admin', function () {
    return 'Privado, area del administrador';
})->can('view-admin')->name('admin');
