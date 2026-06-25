@props([
'name' => 'required',
])

@error($name)
    <p class="mt-2 text-sm text-error" id="description-error">{{ $message }}</p>
@enderror