    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
        <div >
            <table class="table">
                <thead>
                    <tr >
                        <th >Descripción</th>
                        <th >Precio</th>
                        <th >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_iterable($ventas) && !is_string($ventas))
                        @foreach ($ventas as $venta )
                            <tr >
                                <td >{{$venta->descripcion}}</td>
                                <td >${{number_format($venta->precio, 2)}}</td>
                                <td >
                                    <a href="/ventas/{{$venta->id}}" class="btn btn-primary">Ver mas</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr >
                            <td >{{$ventas->descripcion}}</td>
                            <td >${{number_format($ventas->precio, 2)}}</td>
                            <td >
                                <a href="/ventas/{{$ventas->id}}" class="btn btn-primary">Ver mas</a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>