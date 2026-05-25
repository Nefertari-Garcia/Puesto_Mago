<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Models\Venta;
use App\Notifications\VentaPublished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


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
        $data = [
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
        ];

        // Si hay imagen, guardarla
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('ventas', 'public');
            $data['image'] = $imagePath;
        }

        $venta = Auth::user()->ventas()->create($data);

        // Sincronizar categorías si se seleccionaron
        if ($request->has('categorias')) {
            $venta->categorias()->sync($request->categorias);
        }

        // Enviar notificación
        Auth::user()->notify(new VentaPublished($venta));

        return redirect()->route('ventas.index');
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

        $data = $request->validated();

        // Si hay nueva imagen, guardarla
        if ($request->hasFile('image')) {
            // Eliminar imagen antigua si existe
            if ($venta->image) {
                Storage::disk('public')->delete($venta->image);
            }
            $imagePath = $request->file('image')->store('ventas', 'public');
            $data['image'] = $imagePath;
        } else {
            // No reemplazar la imagen si no se subió una nueva
            unset($data['image']);
        }

        $venta->update($data);

        // Sincronizar categorías
        $venta->categorias()->sync($request->categorias ?? []);

        return redirect()->route('ventas.show', $venta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        Gate::authorize('delete', $venta);

        // Eliminar imagen si existe
        if ($venta->image) {
            Storage::disk('public')->delete($venta->image);
        }

        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
