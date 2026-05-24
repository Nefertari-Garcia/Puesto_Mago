<x-layout>

<form method="POST" action="/ventas">
@csrf
        <div class="col-span-full">

          <label for="descripcion" class="block text-sm/6 font-medium text-white">Crea una nueva venta</label>
          <div class="mt-2">
            <textarea id="descripcion" name="descripcion" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required></textarea>
          </div>     
          <x-error name='descripcion'/>                              
          <p class="mt-3 text-sm/6 text-gray-400">¿Tienes una venta que tengas que apuntar?</p>
       
        </div>

        <div class="col-span-full mt-6">
          <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
          <input id="precio" name="precio" type="number" step="0.01" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" required>
        <x-error name='precio'/> 
        
          <p class="mt-3 text-sm/6 text-gray-400">Ingresa el precio de la venta.</p>
        </div>

        
       
       

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            Guardar</button>
        </div>
        
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/ventas" type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            Ver ventas</a>
        </div>
</form>



</x-layout>