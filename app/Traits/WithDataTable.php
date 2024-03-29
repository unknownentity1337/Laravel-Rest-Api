<?php

namespace App\Traits;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Create New User',
                            // 'export' => '#',
                            // 'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            case 'changelog':
                $changelogs = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.changelog',
                    "changelogs" => $changelogs,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('changelog.new'),
                            'create_new_text' => 'Create New Changelog',
                        ]
                    ])
                ];
                break;

            case 'category':
                $categorys = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.category',
                    "categorys" => $categorys,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('category.new'),
                            'create_new_text' => 'Create New Category',
                        ]
                    ])
                ];
                break;

            case 'api':
                $apis = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.api',
                    "apis" => $apis,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('api.new'),
                            'create_new_text' => 'Create New Api',
                        ]
                    ])
                ];
                break;

            case 'all-api':
                $apis = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.api',
                    "apis" => $apis,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('api.new'),
                            'create_new_text' => 'Create New Api',
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}