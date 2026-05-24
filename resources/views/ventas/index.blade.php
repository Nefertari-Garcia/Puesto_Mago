<x-layout>

@if($ventas->count())
    <x-forms.tablaVentas :ventas="$ventas" />
    <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/ventas/create" type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            Nueva venta</a>
    </div>
@else
    <p>No hay ventas. <a href="/ventas/create" class="underline">¡Inscribe la primera venta!</a></p>

@endif
</x-layout>