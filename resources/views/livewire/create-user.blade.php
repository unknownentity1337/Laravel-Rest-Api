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
                <x-jet-label for="name" value="{{ __('Name') }}" />
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
                <x-jet-label for="limit_max" value="{{ __('Limit Max') }}" />
                <small>User Limit Max</small>
                <x-jet-input id="limit_max" type="number" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.limit_max" />
                <x-jet-input-error for="user.limit_max" class="mt-2" />
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="limit_count" value="{{ __('Limit Count') }}" />
                <small>User Limit Count</small>
                <x-jet-input id="limit_count" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="user.limit_count" />
                <x-jet-input-error for="user.limit_max" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="expired" value="{{ __('Expired At') }}" />
                <small>Expired At :
                    {{ $this->user->expired_at ? Carbon\Carbon::parse($this->user->expired_at)->format('d M Y H:i') : 'False' }}</small>
                <select wire:model.defer="user.expired_at" class="mt-1 block w-full form-control shadow-none"
                    id="expired">
                    <option value="NULL">False</option>
                    <option value="{{ today()->addDays(30) }}">1 Month</option>
                    <option value="{{ today()->addDays(60) }}">2 Month</option>
                    <option value="{{ today()->addDays(90) }}">3 Month</option>
                    <option value="{{ today()->addDays(120) }}">4 Month</option>
                    <option value="{{ today()->addDays(150) }}">5 Month</option>
                    <option value="{{ today()->addDays(180) }}">6 Month</option>
                    <option value="{{ today()->addDays(210) }}">7 Month</option>
                    <option value="{{ today()->addDays(240) }}">8 Month</option>
                    <option value="{{ today()->addDays(270) }}">9 Month</option>
                    <option value="{{ today()->addDays(300) }}">10 Month</option>
                    <option value="{{ today()->addDays(330) }}">11 Month</option>
                    <option value="{{ today()->addYears(1) }}">12 Month (1 Year)</option>
                    <option value="{{ today()->addYears(2) }}">24 Month (2 Year)</option>
                    <option value="{{ today()->addYears(3) }}">48 Month (3 Year)</option>
                </select>
                <x-jet-input-error for="expired" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <small>User Status</small>
                <select wire:model.defer="user.status" id="status"
                    class="mt-1 block w-full form-control shadow-none">
                    @if ($action == 'createUser')
                        <option>-- Select Status --</option>
                        <option value="Free">Free</option>
                        <option value="Premium">Premium</option>
                        <option value="Vip">Vip</option>
                    @else
                        <option value="Free" {{ $this->user->status == 'Free' ? 'selected' : '' }}>Free</option>
                        <option value="Premium" {{ $this->user->status == 'Premium' ? 'selected' : '' }}>Premium
                        </option>
                        <option value="Vip" {{ $this->user->status == 'Vip' ? 'selected' : '' }}>Vip</option>
                    @endif
                </select>
                <x-jet-input-error for="user.status" class="mt-2" />
            </div>

            @if ($action == 'createUser')
                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <small>Minimal 8 character</small>
                    <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none"
                        wire:model.defer="user.password" />
                    <x-jet-input-error for="user.password" class="mt-2" />
                </div>

                <div class="form-group col-span-6 sm:col-span-5">
                    <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
                    <small>Minimal 8 character</small>
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
