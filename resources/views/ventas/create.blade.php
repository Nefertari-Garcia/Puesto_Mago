<x-layout>

<form method="POST" action="/ventas" enctype="multipart/form-data">
@csrf
        <div class="col-span-full">

          <label for="descripcion" class="block text-sm/6 font-medium text-white">Crea una nueva venta</label>
          <div class="mt-2">
            <textarea id="descripcion" name="descripcion" rows="3 " class="textarea w-full @error('descripcion') textarea-error @enderror"></textarea>
          </div>     
          <x-error name='descripcion'/>                              
          <p class="mt-3 text-sm/6 text-gray-400">¿Tienes una venta que tengas que apuntar?</p>
       
        </div>

        <div class="col-span-full mt-6">
          <label for="precio" class="block text-sm/6 font-medium text-white">Precio</label>
          <input id="precio" name="precio" type="number" step="0.01" class="textarea w-full @error('precio') textarea-error @enderror">
        <x-error name='precio'/> 
        
          <p class="mt-3 text-sm/6 text-gray-400">Ingresa el precio de la venta.</p>
        </div>

        <div class="space-y-2">
          <label for="image" class="label">Prueba del pago</label>
          <input type="file" name="image" accept="image/*">
          <x-error name='image'/> 
        
        </div>
       
       

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="btn btn-active btn-primary">
            Guardar</button>
        </div>
</form>



</x-layout>