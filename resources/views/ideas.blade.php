<x-layout>

<form method="POST" action="/ideas/publicar">
@csrf
        <div class="col-span-full">
          <label for="idea" class="block text-sm/6 font-medium text-white">Nueva idea</label>
          <div class="mt-2">
            <textarea id="idea" name="idea" rows="3" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
          </div>
          <p class="mt-3 text-sm/6 text-gray-400">¿Tienes una idea que tengas que apuntar?</p>
        </div>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Guardar</button>
        </div>
</form>


@if(count($ideas))
    <div class="mt-6 text-amber-50">
        <h2 class="font-bold">Tus ideas</h2>
        <ul class="mt-6">
            @foreach ($ideas as $idea )
                <li class="text-sm">{{$idea}}</li>
            @endforeach
        </ul>
    </div>
@endif
</x-layout>