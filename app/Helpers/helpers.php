<?php

use App\Models\Venta;

if (!function_exists('format_price')) {
    /**
     * Formatear precio con símbolo de moneda
     */
    function format_price($price)
    {
        return '$' . number_format($price, 2);
    }
}

if (!function_exists('user_ventas')) {
    /**
     * Obtener ventas de un usuario
     */
    function user_ventas($userId)
    {
        return Venta::where('user_id', $userId)->get();
    }
}

if (!function_exists('total_ventas')) {
    /**
     * Calcular total de ventas de un usuario
     */
    function total_ventas($userId)
    {
        return Venta::where('user_id', $userId)->sum('precio');
    }
}

if (!function_exists('cantidad_ventas')) {
    /**
     * Cantidad de ventas de un usuario
     */
    function cantidad_ventas($userId)
    {
        return Venta::where('user_id', $userId)->count();
    }
}
