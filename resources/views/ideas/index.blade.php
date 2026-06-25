<x-layout>


    @if ($ideas->count())
        <div class="mt-6 text-white">
            <h2 class="font-bold text-lg text-white">Your ideas</h2>
            <ul class='mt-6 grid grid-cols-2 gap-x-6 gap-y-4'>
                @foreach ($ideas as $idea)
                    <x-idea-card href="/ideas/{{$idea->id}}">
                        {{ $idea->description }}
                    </x-idea-card>
                @endforeach
            </ul>
        </div>
    @else
        <p class="mt-6 text-white">No ideas yet. <a href="/ideas/create" class="underline text-indigo-500 hover:text-indigo-400">Create one</a>.</p>
    @endif
</x-layout>