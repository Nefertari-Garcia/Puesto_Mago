<x-layout title="Welcome">

    {{$greeting }}, {{$person}}!

    @if (count($tasks))
    <p>Si, tenemos pendeintes. Cuantos? Son <?=count($tasks)?> pendientes!</p>
    @endif

    @forelse( $tasks as $tasks )
        <li>{{$tasks}}</li>
        @empty 
        <p>No se encuentra ningun pendiente</p>
    @endforelse


    
</x-layout>
