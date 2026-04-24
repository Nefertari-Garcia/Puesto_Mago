<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $ventas = DB::table('backpack')->get();
    dd($ventas);
    return view('ventas', [
        'ventas' => $venta,
    ]);
});


Route::get('/ventas', function () {
    $ventas = session()->get('ventas', []);
    return view('ventas', [
        'ventas' => $ventas,
    ]);
});


Route::post('/ventas', function () {
    $venta = request('venta');
    session()->push('ventas', $venta);
    return redirect('/ventas');
});


Route::get('delete-ventas', function () {
    session()->forget('ventas');
    return redirect('/ventas');
});
