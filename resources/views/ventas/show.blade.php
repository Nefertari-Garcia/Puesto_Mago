<x-layout>

@if($ventas->count())
    <div class="mt-6 text-amber-50">
        <h2 class="font-bold">Tus ventas</h2>
        
        <div class="mt-6">
            {{$ventas->descripcion}}
        </div>
        
        <div class="mt-6">
            {{$ventas->precio}}
        </div>

        <div class="mt-6">
        
             <a href="/ventas/{{$ventas->id}}/edit" class=" rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
             Editar</a>
            

        </div>
    </div>
@endif
</x-layout>