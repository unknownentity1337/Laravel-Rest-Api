<div>
    <x-data-table :data="$data" :model="$categorys">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Title
                        @include('components.sort-icon', ['field' => 'title'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('icon')" role="button" href="#">
                        Icon
                        @include('components.sort-icon', ['field' => 'icon'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('slug')" role="button" href="#">
                        Slug
                        @include('components.sort-icon', ['field' => 'slug'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($categorys as $category)
                <tr x-data="window.__controller.dataTableController({{ $category->id }})">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{!! $category->icon !!}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('category.edit', ['categoryId' => $category->id]) }}"
                            class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
