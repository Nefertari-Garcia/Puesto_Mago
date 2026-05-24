<x-layout>

<form method="POST" action="/ventas/{{$ventas->id}}">
@csrf
@method('PATCH')
        <h1 class="text-amber-50">Editar</h1>
        <div class="col-span-full">
          <label for="descripcion" class="block text-sm/6 font-medium text-white">Nombre</label>
          <div class="mt-2">
            <textarea id="descripcion" name="descripcion" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>{{$ventas->descripcion}}</textarea>
          </div>
        </div>
        <div class="col-span-full">
          <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
          <div class="mt-2">
            <textarea id="precio" name="precio" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>{{$ventas->precio}}</textarea>
          </div>
        </div>


    
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            Actualizar</button>
        </div>

         <div class="mt-6 flex items-center justify-end gap-x-6">
            
            <button form="delete-venta-form" type="submit" class="rounded-md bg-red-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            Eliminar</button>
        </div>
</form>

<form id="delete-venta-form" method="POST" action="/ventas/{{$ventas->id}}">

@csrf
@method('DELETE')
</form>
</x-layout>