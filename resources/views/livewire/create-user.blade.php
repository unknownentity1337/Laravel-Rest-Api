<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('User') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data user baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Nama') }}" />
                <small>User Name</small>
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.name" />
                <x-jet-input-error for="user.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <small>User Email</small>
                <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.email" />
                <x-jet-input-error for="user.email" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="limit" value="{{ __('Limit') }}" />
                <small>User Limit</small>
                <x-jet-input id="limit" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.limit" />
                <x-jet-input-error for="user.limit" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <small>User Status</small>
                <select wire:model.defer="user.status" id="status"
                    class="mt-1 block w-full form-control shadow-none">
                    @if ($action == 'createUser')
                        <option>-- Select Status --</option>
                        <option value="free">Free</option>
                        <option value="premium">Premium</option>
                        <option value="vip">Vip</option>
                    @else
                        <option value="free" {{ $this->user->status == 'free' ? 'selected' : '' }}>Free</option>
                        <option value="premium" {{ $this->user->status == 'premium' ? 'selected' : '' }}>Premium
                        </option>
                        <option value="vip" {{ $this->user->status == 'vip' ? 'selected' : '' }}>Vip</option>
                    @endif
                </select>
                <x-jet-input-error for="user.status" class="mt-2" />
            </div>

            @if ($action == 'createUser')
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none"
                        wire:model.defer="user.password" />
                    <x-jet-input-error for="user.password" class="mt-2" />
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                    <small>Minimal 8 karakter</small>
                    <x-jet-input id="password_confirmation" type="password"
                        class="mt-1 block w-full form-control shadow-none"
                        wire:model.defer="user.password_confirmation" />
                    <x-jet-input-error for="user.password_confirmation" class="mt-2" />
                </div>
            @endif
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
