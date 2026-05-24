<x-layout>

@if($ventas->count())
    <x-forms.tablaVentas :ventas="$ventas" />

@else
    <p>No hay ventas. <a href="/ventas/create" class="underline">¡Inscribe la primera venta!</a></p>

@endif
<p class="mt-6"><a href="/ventas/create" class="underline">Crea una nueva</a></p>
</x-layout>