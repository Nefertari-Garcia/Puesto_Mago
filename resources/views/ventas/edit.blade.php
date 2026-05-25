<x-layout>

<form method="POST" action="{{ route('ventas.update', $venta) }}" enctype="multipart/form-data">
@csrf
@method('PATCH')
    <h1 class="text-2xl font-bold mb-6">Editar Venta</h1>

    @if($venta->image)
        <div class="mb-6">
            <p class="text-white mb-2">Imagen actual:</p>
            <img src="{{ asset('storage/' . $venta->image) }}" alt="Venta" class="w-full max-w-md rounded-lg">
        </div>
    @endif

    <div class="col-span-full">
        <label for="descripcion" class="block text-sm/6 font-medium text-white">Descripción</label>
        <div class="mt-2">
            <textarea
                id="descripcion"
                name="descripcion"
                rows="3"
                minlength="5"
                required
                class="textarea w-full @error('descripcion') textarea-error @enderror"
            >{{ old('descripcion', $venta->descripcion) }}</textarea>
            <x-error name="descripcion"/>
        </div>
    </div>

    <div class="col-span-full mt-6">
        <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
        <div class="mt-2">
            <input
                id="precio"
                name="precio"
                type="number"
                step="0.01"
                min="30"
                max="1000"
                required
                value="{{ old('precio', $venta->precio) }}"
                class="input w-full @error('precio') input-error @enderror"
            >
            <x-error name="precio"/>
        </div>
    </div>

    <div class="col-span-full mt-6">
        <label class="block text-sm/6 font-medium text-white">Categorías</label>
        <div class="mt-2 flex flex-wrap gap-3">
            @foreach(\App\Models\Categoria::all() as $categoria)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="checkbox"
                        name="categorias[]"
                        value="{{ $categoria->id }}"
                        class="checkbox checkbox-primary"
                        {{ $venta->categorias->contains($categoria->id) ? 'checked' : '' }}
                    >
                    <span>{{ $categoria->nombre }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="space-y-2 mt-6">
        <label for="image" class="label">Cambiar imagen (opcional)</label>
        <input type="file" name="image" id="image" accept="image/*" class="file-input w-full">
        <x-error name='image'/>
    </div>

    <div class="mt-6 flex items-center gap-x-4">
        <a href="{{ route('ventas.show', $venta) }}" class="btn btn-ghost">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <button form="delete-venta-form" type="submit" class="btn btn-error">Eliminar</button>
    </div>
</form>

<form id="delete-venta-form" method="POST" action="{{ route('ventas.destroy', $venta) }}">
@csrf
@method('DELETE')
</form>

</x-layout>
