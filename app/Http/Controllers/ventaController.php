<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::query()->where([
            'user_id' => Auth::id(),
        ])->get();

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

        Venta::create([
            'user_id' => Auth::id(),
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
        return view('ventas.show', [
            'ventas' => $venta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        return view('ventas.edit', [
            'ventas' => $venta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVentaRequest $request, Venta $venta)
    {
        $venta->update($request->validated());
        return redirect("/ventas/{$venta->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect('/ventas');
    }
}
