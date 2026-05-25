<x-layout>

<form method="POST" action="/ventas" enctype="multipart/form-data">
@csrf
    <div class="col-span-full">
        <label for="descripcion" class="block text-sm/6 font-medium text-white">Crea una nueva venta</label>
        <div class="mt-2">
            <textarea
                id="descripcion"
                name="descripcion"
                rows="3"
                minlength="5"
                required
                class="textarea w-full @error('descripcion') textarea-error @enderror"
            >{{ old('descripcion') }}</textarea>
        </div>
        <x-error name='descripcion'/>
        <p class="mt-3 text-sm/6 text-gray-400">¿Tienes una venta que tengas que apuntar?</p>
    </div>

    <div class="col-span-full mt-6">
        <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
        <input
            id="precio"
            name="precio"
            type="number"
            step="0.01"
            min="30"
            max="1000"
            required
            value="{{ old('precio') }}"
            class="input w-full @error('precio') input-error @enderror"
        >
        <x-error name='precio'/>
        <p class="mt-3 text-sm/6 text-gray-400">Ingresa el precio de la venta (entre $30 y $1000).</p>
    </div>

    <div class="col-span-full mt-6">
        <label for="categorias" class="block text-sm/6 font-medium text-white">Categorías</label>
        <div class="mt-2 flex flex-wrap gap-3">
            @foreach(\App\Models\Categoria::all() as $categoria)
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="checkbox"
                        name="categorias[]"
                        value="{{ $categoria->id }}"
                        class="checkbox checkbox-primary"
                        {{ in_array($categoria->id, old('categorias', [])) ? 'checked' : '' }}
                    >
                    <span>{{ $categoria->nombre }}</span>
                </label>
            @endforeach
        </div>
        <x-error name='categorias'/>
    </div>

    <div class="space-y-2 mt-6">
        <label for="image" class="label">Prueba del pago</label>
        <input type="file" name="image" id="image" accept="image/*" class="file-input w-full">
        <x-error name='image'/>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="{{ route('ventas.index') }}" class="btn btn-ghost">Cancelar</a>
        <button type="submit" class="btn btn-active btn-primary">Guardar</button>
    </div>
</form>

</x-layout>
