<x-layout>



@if($ventas->count())
    <div class="mt-6 text-amber-50">
        <h2 class="font-bold">Tus ventas</h2>
        <ul class="mt-6">
            @foreach ($ventas as $venta )
                <a href="/ventas/{{$venta->id}}" class="text-sm">{{$venta->descripcion}}</a>
            @endforeach
        </ul>

        <ul class="mt-6">
            @foreach ($ventas as $venta )
                <a href="/ventas/{{$venta->id}}" class="text-sm">{{$venta->precio}}</a>
            @endforeach
        </ul>
    </div>
@else
    <p>No hay ventas. <a href="/ventas/create" class="underline">¡Inscribe la primera venta!</a></p>

@endif
</x-layout>