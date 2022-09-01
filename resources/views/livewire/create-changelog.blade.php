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
                <x-jet-label for="content" value="{{ __('Description') }}" />
                <small>Description</small>
                <textarea wire:model.defer="content" class="mt-1 block w-full form-control shadow-none" id="content" name="content">
                        @if ($action == 'updateChangelog')
{!! $changelog->content !!}
@endif
                    </textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set('content', editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>
