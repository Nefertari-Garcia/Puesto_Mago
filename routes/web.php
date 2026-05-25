<?php

use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;
use App\Models\Venta;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\SessionsController;

Route::get('/', function () {
    return ('Placeholder del inicio de la pagina');
});

Route::middleware('auth')->group(function () {
    //Index
    Route::get('/ventas', [ventaController::class, 'index']);

    //Crear
    Route::get('/ventas/create', [ventaController::class, 'create']);

    //store
    Route::post('/ventas', [ventaController::class, 'store']);

    //Mostrar
    Route::get('/ventas/{venta}', [ventaController::class, 'show']);

    //Editar
    Route::get('/ventas/{venta}/edit', [ventaController::class, 'edit']);

    //Actualizar
    Route::patch('/ventas/{venta}', [ventaController::class, 'update']);


    //destroy
    Route::delete('/ventas/{venta}', [ventaController::class, 'destroy']);
    Route::delete('/logout', [SessionsController::class, 'destroy']);
});
Route::middleware('guest')->group(function () {

    // Registro
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);
});

Route::get('/admin', function () {
    return 'Privado, area del administrador';
})->can('view-admin');
