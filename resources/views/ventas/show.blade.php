<x-layout>
    <div class="card bg-neutral p-6 mt-6 ">
        <h1 class="text-3xl font-bold" >Detalles de la venta</h2>
        
        @if($venta->image)
            <div class="mb-6">
                <img src="{{ asset('storage/' . $venta->image) }}" alt="Venta" class="w-full max-w-md rounded-lg">
            </div>
        @endif

        <div class="mt-6" >
            <div class="mb-6">
                <p class="card-title">Descripción</p>
                <p >{{$venta->descripcion}}</p>
            </div>
            <div class="mb-6">
                <p class="card-title">Precio</p>
                <p >{{ format_price($venta->precio) }}</p>
            </div>
            @if($venta->categorias->count())
            <div class="mb-6">
                <p class="card-title">Categorías</p>
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($venta->categorias as $categoria)
                        <span class="badge badge-primary">{{ $categoria->nombre }}</span>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        
        <div >
            <a href="/ventas/{{$venta->id}}/edit" class="btn btn-active btn-primary">
                Editar
            </a>
        </div>
    </div>

</x-layout>