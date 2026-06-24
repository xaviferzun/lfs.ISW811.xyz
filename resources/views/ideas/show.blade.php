<x-layout>
    <div class="mt-6 text-white">
        <h2 class="font-bold text-lg text-white">Your ideas</h2>
        <div class='mt-6'|>
            {{ $idea->description }}
        </div>

        <div>
            <a href="/ideas/{{ $idea->id }}/edit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Edit</a>
        </div>
</x-layout>   