<x-layout>
    <div>
        <header class="py-8 md:py-12">
            <h1 class="text-3xl font-bold">Ideas</h1>
            <p class="text-muted-foreground text-sm mt-2">Capture your thoughts. Make a plan.</p>

            <x-card 
                x-data
                @click="$dispatch('open-modal', 'create-idea')"
                is="button"
                type="button"
                data-test="create-idea-button"
                class="mt-10 cursor-pointer h-32 w-full text-left"
            >
                <p>What's the idea?</p>
            </x-card>
        </header>

        <div>
            <a href="/ideas" class="btn {{ request()->has('status') ? 'btn-outlined' : '' }}">All</a>

            @foreach (App\IdeaStatus::cases() as $status)                
                <a
                    href="/ideas?status={{ $status->value }}"
                    class="btn {{ request('status') === $status->value ? '' : 'btn-outlined' }}"
                >
                    {{ $status->label() }} <span class="text-xs pl-3">{{ $statusCounts->get($status->value) }}</span>
                </a>
            @endforeach
        </div>

        <div class="mt-10 text-muted-foreground">
            <div class="grid md:grid-cols-2 gap-6">
                @forelse($ideas as $idea)
                    <x-card href="{{ route('idea.show', $idea) }}">
                        <h3 class="text-foreground text-lg">{{ $idea->title }}</h3>
                        <div class="mt-1">
                            <x-idea.status-label status="{{ $idea->status }}">
                                {{ $idea->status->label() }}
                            </x-idea.status-label>
                        </div>

                        <div class="mt-5 line-clamp-3">{{ $idea->description }}</div>
                        <div class="mt-4">{{ $idea->created_at->diffForHumans() }}</div>
                    </x-card>
                @empty
                    <x-card>
                        <p>No ideas at this time.</p>
                    </x-card>
                @endforelse
            </div>
        </div>
        
        {{-- Modal for creating a new idea --}}
        <x-modal name="create-idea" title="New Idea">
            <form
                x-data="{
                    status: @js(App\IdeaStatus::PENDING->value),
                    links: [],
                    newLink: '',
                    steps: [],
                    newStep: '',
                }"
                method="POST"
                action="{{ route('idea.store') }}"
            >
                @csrf

                <div class="space-y-6">
                    <x-form.field
                        label="Title"
                        name="title"
                        placeholder="Enter an idea for your title"
                        autofocus
                        required
                    />

                    <div class="space-y-2">
                        <label for="status" class="label">Status</label>

                        <div class="flex gap-x-3">
                            @foreach (App\IdeaStatus::cases() as $status)
                                <button
                                    type="button"
                                    @click="status = @js($status->value)"
                                    data-test="status-{{ $status->value }}"
                                    class="btn flex-1 h-10"
                                    :class="{'btn-outlined': status !== @js($status->value)}"
                                >
                                    {{ $status->label() }}
                                </button>
                            @endforeach

                            <input type="hidden" name="status" :value="status" class="input">
                        </div>

                        <x-form.error name="status" />
                    </div>

                    <x-form.field
                        label="Description"
                        name="description"
                        type="textarea"
                        placeholder="Describe your idea..."
                    />

                    <div>
                        <fieldset class="space-y-3">
                            <legend class="label">Actionable Steps</legend>

                            <template x-for="(step, index) in steps">
                                <div class="flex gap-x-2 items-center">
                                    <input name="steps[]" x-model="step" class="input" readonly>

                                    <button
                                        type="button"
                                        aria-label="Remove step"
                                        @click="steps.splice(index, 1)"
                                        class="form-muted-icon"
                                    >
                                        <x-icons.close />
                                    </button>
                                </div>
                            </template>
                        </fieldset>

                        <div class="flex gap-x-2 items-center">
                            <input
                                x-model="newStep"
                                type="text"
                                id="new-step"
                                data-test="new-step"
                                placeholder="What's the next step?"
                                class="input flex-1"
                                spellcheck="false"
                            >

                            <button
                                type="button"
                                @click="steps.push(newStep.trim()); newStep = '';"
                                data-test="submit-new-step-button"
                                :disabled="newStep.trim().length === 0"
                                aria-label="Add a new step"
                                class="form-muted-icon"
                            >
                                <x-icons.close class="rotate-45" />
                            </button>
                        </div>
                    </div>



                    <div>
                        <fieldset class="space-y-3">
                            <legend class="label">Links</legend>

                            <template x-for="(link, index) in links">
                                <div class="flex gap-x-2 items-center">
                                    <input name="links[]" x-model="link" class="input">

                                    <button
                                        type="button"
                                        aria-label="Remove link"
                                        @click="links.splice(index, 1)"
                                        class="form-muted-icon"
                                    >
                                        <x-icons.close />
                                    </button>
                                </div>
                            </template>
                        </fieldset>

                        <div class="flex gap-x-2 items-center">
                            <input
                                x-model="newLink"
                                type="url"
                                id="new-link"
                                data-test="new-link"
                                placeholder="http://example.com"
                                autocomplete="url"
                                class="input flex-1"
                                spellcheck="false"
                            >

                            <button
                                type="button"
                                @click="links.push(newLink.trim()); newLink = '';"
                                data-test="submit-new-link-button"
                                :disabled="newLink.trim().length === 0"
                                aria-label="Add a new link"
                                class="form-muted-icon"
                            >
                                <x-icons.close class="rotate-45" />
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-end gap-x-5">
                        <button type="button" @click="$dispatch('close-modal')" class="btn btn-outlined">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Idea</button>
                    </div>
                </div>
            </form>
        </x-modal>
    </div>
</x-layout>