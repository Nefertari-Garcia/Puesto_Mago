<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Auth::user()->ventas;

        return view('ventas.index', [
            'ventas' => $ventas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVentaRequest $request)
    {
        Auth::user()->ventas()->create([
            'descripcion' => request('descripcion'),
            'precio' => request('precio'),
        ]);


        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        Gate::authorize('view', $venta);
        return view('ventas.show', [
            'venta' => $venta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        Gate::authorize('update', $venta);
        return view('ventas.edit', [
            'venta' => $venta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVentaRequest $request, Venta $venta)
    {
        Gate::authorize('update', $venta);
        $venta->update($request->validated());
        return redirect("/ventas/{$venta->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        Gate::authorize('delete', $venta);
        $venta->delete();
        return redirect('/ventas');
    }
}
