    <div class="mt-6">
        <h2 class="font-bold text-amber-50">Tus ventas</h2>
        <div class="mt-6 overflow-x-auto">
            <table class="w-full border-collapse border border-gray-400">
                <thead>
                    <tr class="bg-indigo-600">
                        <th class="border border-gray-400 px-4 py-2 text-left text-amber-50 font-semibold">Descripción</th>
                        <th class="border border-gray-400 px-4 py-2 text-right text-amber-50 font-semibold">Precio</th>
                        <th class="border border-gray-400 px-4 py-2 text-center text-amber-50 font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ventas as $venta )
                        <tr class="hover:bg-gray-700 transition">
                            <td class="border border-gray-400 px-4 py-2 text-amber-50">{{$venta->descripcion}}</td>
                            <td class="border border-gray-400 px-4 py-2 text-right text-amber-50">${{number_format($venta->precio, 2)}}</td>
                            <td class="border border-gray-400 px-4 py-2 text-center">
                                <a href="/ventas/{{$venta->id}}" class="text-blue-400 hover:text-blue-300 underline text-sm">Ver mas</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>