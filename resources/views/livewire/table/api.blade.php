<div>
    <x-data-table :data="$data" :model="$apis">
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
                <th><a wire:click.prevent="sortBy('description')" role="button" href="#">
                        Description
                        @include('components.sort-icon', ['field' => 'description'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('content')" role="button" href="#">
                        Category
                        @include('components.sort-icon', ['field' => 'content'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('method')" role="button" href="#">
                        Method
                        @include('components.sort-icon', ['field' => 'method'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        Status
                        @include('components.sort-icon', ['field' => 'status'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($apis as $api)
                <tr x-data="window.__controller.dataTableController({{ $api->id }})">
                    <td>{{ $api->id }}</td>
                    <td>{{ $api->title }}</td>
                    <td>{{ $api->description }}</td>
                    <td>{{ $api->category->title }}</td>
                    <td>{{ $api->method }}</td>
                    <td>{{ $api->status ? 'Active' : 'Deactive' }}</td>
                    <td>{{ $api->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('api.edit', ['apiId' => $api->id]) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
