<x-layout>
    <div class="mt-6">
        <h2 class="font-bold text-amber-50">Detalles de la venta</h2>
        <div class="mt-6 bg-gray-800 border border-gray-600 rounded-lg p-6">
            <div class="mb-4">
                <p class="text-gray-400 text-sm">Descripción</p>
                <p class="text-amber-50 font-semibold text-lg">{{$ventas->descripcion}}</p>
            </div>
            <div class="mb-6">
                <p class="text-gray-400 text-sm">Precio</p>
                <p class="text-amber-50 font-semibold text-lg">${{number_format($ventas->precio, 2)}}</p>
            </div>
        </div>
        
        <div class="mt-6 flex items-center gap-x-4">
            <a href="/ventas/{{$ventas->id}}/edit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-600">
                Editar
            </a>
    
            <a href="/ventas" class="rounded-md bg-gray-600 px-3 py-2 text-sm font-semibold text-white hover:bg-gray-700">
                Volver
            </a>
        </div>
    </div>

</x-layout>