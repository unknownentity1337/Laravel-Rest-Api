<x-jet-form-section submit="updateApiInformation">
    <x-slot name="title">
        {{ __('Api Key Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Customizing Your Api Key (Premium/Vip) User Only , Recommendation : Dont Use Predictable Api') }}
    </x-slot>

    <x-slot name="form">
        <!-- Api Key -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="api" value="{{ __('Api Key') }}" />
            <x-jet-input id="api" type="text" class="mt-1 block w-full" wire:model.defer="api"
                autocomplete="api" />
            <x-jet-input-error for="api" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
