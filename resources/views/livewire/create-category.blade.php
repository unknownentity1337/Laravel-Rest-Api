<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Category') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Fill All Form') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <small>Title</small>
                <x-jet-input id="title" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="category.title" />
                <x-jet-input-error for="category.title" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="content" value="{{ __('Slug') }}" />
                <small>Slug</small>
                {{-- @if ($action == 'updateCategory') --}}
                <x-jet-input id="slug" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="category.slug" />
                <x-jet-input-error for="category.slug" class="mt-2" />
                {{-- @endif --}}
            </div>
        </x-slot>
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>

    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>
