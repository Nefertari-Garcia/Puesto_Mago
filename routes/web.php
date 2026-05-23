<?php

use Illuminate\Support\Facades\Route;
use App\Models\Venta;

Route::get('/ventas', function () {
    $ventas = Venta::all();

    return view('ventas', [
        'ventas' => $ventas,
    ]);
});

Route::get('/ventas/{id}', function ($id) {
    dd($id);
    $venta = Venta::find($id);
    return $venta;
});

Route::post('/ventas', function () {
    $data = request()->validate([
        'venta' => 'required|string',
        'precio' => 'required|numeric',
    ]);

    Venta::create([
        'descripcion' => $data['venta'],
        'precio' => $data['precio'],
    ]);

    return redirect('/ventas');
});

Route::get('/ventas', function () {
    $ventas = Venta::all();

    return view('ventas', [
        'ventas' => $ventas,
    ]);
});

Route::get('delete-ventas', function () {
    Venta::truncate();
    return redirect('/ventas');
});
