<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Changelog') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Fill All Form') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="title" value="{{ __('Title') }}" />
                <small>Title</small>
                <x-jet-input id="title" type="text" class="mt-1 block w-full form-control shadow-none"
                    wire:model.defer="changelog.title" />
                <x-jet-input-error for="changelog.title" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="content" value="{{ __('Content') }}" />
                <small>Content</small>
                <div wire:ignore>
                    @if ($action == 'updateChangelog')
                        <textarea class="mt-1 block w-full form-control shadow-none" id="content" wire:model="content">{!! $this->changelog->content !!}</textarea>
                    @else
                        <textarea class="mt-1 block w-full form-control shadow-none" id="content" wire:model="content"></textarea>
                    @endif
                </div>
                <x-jet-input-error for="content" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>
            <div>
                <x-jet-button>
                    {{ __($button['submit_text']) }}
                </x-jet-button>
            </div>
        </x-slot>

    </x-jet-form-section>
    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
    @push('script')
        <script>
            $('#content').summernote({
                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        @this.set('content', contents);
                    }
                }
            });
        </script>
    @endpush
</div>
