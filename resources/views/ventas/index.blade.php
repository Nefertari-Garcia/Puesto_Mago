<x-layout>

@if($ventas->count())
    <x-forms.tablaVentas :ventas="$ventas" />

@else
    <p>No hay ventas. <a href="/ventas/create" class="underline">¡Inscribe la primera venta!</a></p>

@endif
</x-layout>