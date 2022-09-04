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
                <small>Api Title</small>
                <x-jet-input id="title" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model="api.title" />
                <x-jet-input-error for="api.title" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="slug" value="{{ __('Slug') }}" />
                <small>Api Slug</small>
                <x-jet-input id="slug" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="api.slug" />
                <x-jet-input-error for="api.slug" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <small>Api Description</small>
                <x-jet-input id="description" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="api.description" />
                <x-jet-input-error for="api.description" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="category" value="{{ __('Category') }}" />
                <small>Api Category</small>
                <select wire:model.defer="api.category_id" id="category_id"
                    class="mt-1 block w-full form-control shadow-none">
                    <option>-- Select Category --</option>
                    @forelse ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                    @empty
                    @endforelse
                </select>
                <x-jet-input-error for="api.category_id" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="method" value="{{ __('Method') }}" />
                <small>Api Method</small>
                <x-jet-input id="method" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="api.method" />
                <x-jet-input-error for="api.method" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="parameter" value="{{ __('Parameter') }}" />
                <small>Api Parameter</small>
                <x-jet-input id="parameter" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="api.parameter" />
                <x-jet-input-error for="api.parameter" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="for" value="{{ __('For Status') }}" />
                <small>Api For Status</small>
                <select wire:model.defer="api.for" id="for" class="mt-1 block w-full form-control shadow-none">
                    <option>-- Select Status --</option>
                    <option value="Free">Free</option>
                    <option value="Premium">Premium</option>
                    <option value="Vip">Vip</option>
                </select>
                <x-jet-input-error for="api.for" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="Status" value="{{ __('Status') }}" />
                <small>Api Status</small>
                <select wire:model.defer="api.status" id="status" class="mt-1 block w-full form-control shadow-none">
                    <option>-- Select Category --</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
                <x-jet-input-error for="api.status" class="mt-2" />
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="docs" value="{{ __('Docs') }}" />
                <small>Api Docs</small>
                <x-jet-input id="docs" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="api.docs_id" />
                <x-jet-input-error for="api.docs_id" class="mt-2" />
            </div> --}}


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
