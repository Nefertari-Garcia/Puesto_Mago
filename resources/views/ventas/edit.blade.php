<x-layout>

<form method="POST" action="/ventas/{{$venta->id}}" enctype="multipart/form-data">
@csrf
@method('PATCH')
        <h1 class="text-amber-50">Editar Venta</h1>
        
        @if($venta->image)
            <div class="mb-6">
                <p class="text-white mb-2">Imagen actual:</p>
                <img src="{{ asset('storage/' . $venta->image) }}" alt="Venta" class="w-full max-w-md rounded-lg">
            </div>
        @endif

        <div class="col-span-full">
          <label for="descripcion" class="block text-sm/6 font-medium text-white">Descripción</label>
          <div class="mt-2">
            <textarea id="descripcion" name="descripcion" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>{{$venta->descripcion}}</textarea>
            <x-error name="descripcion"/>
          </div>
        </div>

        <div class="col-span-full">
          <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
          <div class="mt-2">
            <input id="precio" name="precio" type="number" step="0.01" value="{{$venta->precio}}" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required/>
            <x-error name="precio"/>
          </div>
        </div>

        <div class="space-y-2 mt-6">
          <label for="image" class="label">Cambiar imagen (opcional)</label>
          <input type="file" name="image" accept="image/*" class="file-input">
          <x-error name='image'/> 
        </div>
    
        <div class="mt-6 flex items-center gap-x-4">
            <button type="submit" class="btn btn-primary">
                Actualizar
            </button>
            
            <button form="delete-venta-form" type="submit" class="btn btn-error">
                Eliminar
            </button>
        </div>
</form>

<form id="delete-venta-form" method="POST" action="/ventas/{{$venta->id}}">
@csrf
@method('DELETE')
</form>
</x-layout>