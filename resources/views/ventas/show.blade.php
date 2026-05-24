<x-layout>
    <div class="card bg-neutral p-6 mt-6 ">
        <h1 class="text-3xl font-bold" >Detalles de la venta</h2>
        <div class="mt-6" >
            <div class="mb-6">
                <p class="card-title">Descripción</p>
                <p >{{$venta->descripcion}}</p>
            </div>
            <div class="mb-6">
                <p class="card-title">Precio</p>
                <p >${{number_format($venta->precio, 2)}}</p>
            </div>
        </div>
        
        <div >
            <a href="/ventas/{{$venta->id}}/edit" class="btn btn-active btn-primary">
                Editar
            </a>
        </div>
    </div>

</x-layout>