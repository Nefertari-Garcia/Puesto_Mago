@props(
    [
        'name' => 'required'
    ]
)

@error($name)
    <p class="mt-1 text-xs text-error">{{$message}}</p>
@enderror