    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <div >
            <table class="table">
                <thead>
                    <tr >
                        <th >Imagen</th>
                        <th >Descripción</th>
                        <th >Precio</th>
                        <th >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_iterable($ventas) && !is_string($ventas))
                        @foreach ($ventas as $venta )
                            <tr >
                                <td >
                                    @if($venta->image)
                                        <img src="{{ asset('storage/' . $venta->image) }}" alt="Venta" class="w-16 h-16 rounded">
                                    @else
                                        <span class="text-gray-400">Sin imagen</span>
                                    @endif
                                </td>
                                <td >{{$venta->descripcion}}</td>
                                <td >{{ format_price($venta->precio) }}</td>
                                <td >
                                    <a href="/ventas/{{$venta->id}}" class="btn btn-primary">Ver mas</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr >
                            <td >
                                @if($ventas->image)
                                    <img src="{{ asset('storage/' . $ventas->image) }}" alt="Venta" class="w-16 h-16 rounded">
                                @else
                                    <span class="text-gray-400">Sin imagen</span>
                                @endif
                            </td>
                            <td >{{$ventas->descripcion}}</td>
                            <td >{{ format_price($ventas->precio) }}</td>
                            <td >
                                <a href="/ventas/{{$ventas->id}}" class="btn btn-primary">Ver mas</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>