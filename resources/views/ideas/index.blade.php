<x-layout>


    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold text-lg text-white">Your ideas</h2>
            <ul class='mt-6'>
                @foreach ($ideas as $idea)
                    <li><a href="/ideas/{{ $idea->id }}" class="text-small">{{ $idea->description }}</a></li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="mt-6 text-white">No ideas yet. <a href="/ideas/create" class="underline text-indigo-500 hover:text-indigo-400">Create one</a>.</p>
    @endif
</x-layout>