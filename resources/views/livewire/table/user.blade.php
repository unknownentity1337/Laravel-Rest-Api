<div>
    <x-data-table :data="$data" :model="$users">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                        ID
                        @include('components.sort-icon', ['field' => 'id'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('name')" role="button" href="#">
                        Name
                        @include('components.sort-icon', ['field' => 'name'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('email')" role="button" href="#">
                        Email
                        @include('components.sort-icon', ['field' => 'email'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('limit_max')" role="button" href="#">
                        Limit Max
                        @include('components.sort-icon', ['field' => 'limit_max'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('limit_count')" role="button" href="#">
                        Limit Count
                        @include('components.sort-icon', ['field' => 'limit_count'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                        Status
                        @include('components.sort-icon', ['field' => 'status'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                        Created At
                        @include('components.sort-icon', ['field' => 'created_at'])
                    </a></th>
                <th><a wire:click.prevent="sortBy('expired_at')" role="button" href="#">
                        Expired At
                        @include('components.sort-icon', ['field' => 'expired_at'])
                    </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($users as $user)
                <tr x-data="window.__controller.dataTableController({{ $user->id }})">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->limit_max }}</td>
                    <td>{{ $user->limit_count }}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $user->expired_at ? Carbon\Carbon::parse($user->expired_at)->format('d M Y H:i') : 'False' }}
                    </td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="{{ route('user.edit', ['userId' => $user->id]) }}" class="mr-3"><i
                                class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i
                                class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
