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
                            'export' => '#',
                            'export_text' => 'Export'
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

            default:
                # code...
                break;
        }
    }
}