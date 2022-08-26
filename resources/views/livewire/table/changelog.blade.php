<div>
    <x-data-table :data="$data" :model="$changelogs">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Title
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                <th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Content
                        @include('components.sort-icon', ['field' => 'content'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($changelogs as $changelog)
                <tr x-data="window.__controller.dataTableController({{ $changelog->id }})">
                    <td>{{ $changelog->id }}</td>
                    <td>{{ $changelog->title }}</td>
                    <td>{{ $changelog->content }}</td>
                    <td>{{ $changelog->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('changelog.edit', ['changelogId' => $changelog->id]) }}"
                            class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
