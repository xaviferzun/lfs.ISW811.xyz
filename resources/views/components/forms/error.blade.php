@props([
'name' => 'required',
])

@error($name)
    <p class="mt-2 text-sm text-red-600" id="description-error">{{ $message }}</p>
@enderror