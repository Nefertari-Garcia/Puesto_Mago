<?php

use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;
use App\Models\Venta;
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


// Route::get('/register', [RegisteredUserController::class, 'create']);
// Route::get('/register', [RegisteredUserController::class, 'store']);
