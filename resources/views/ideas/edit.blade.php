<x-layout>
    <form method="POST" action="/ideas/{{ $idea->id }}/edit">
        @csrf
        @method('PATCH')

        <div class="col-span-full">
          <label for="description" class="block text-sm/6 font-medium text-white">Edit idea</label>
          <div class="mt-2">
            <textarea id="description" name="description" rows="3"
                class="textarea w-full">{{ $idea->description }}</textarea>
            <x-forms.error name="description" />
          </div>
        </div>

        <div class="mt-6 flex items-center gap-x-2">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

    <form method="POST" action="/ideas/{{ $idea->id }}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-warning">Delete</button>
    </form>
</x-layout>