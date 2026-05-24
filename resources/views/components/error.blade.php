@props(
    [
        'name' => 'required'
    ]
)

@error($name)
    <p class="mt-3 text-sm/6 text-red-400">{{$message}}</p>
@enderror