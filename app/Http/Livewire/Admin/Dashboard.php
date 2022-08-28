<?php

namespace App\Http\Livewire\Admin;

use App\Models\Api;
use App\Models\Category;
use App\Models\Changelog;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{

    public $user, $changelog, $category, $api;
    public function mount()
    {
        $this->user = User::all()->count();
        $this->changelog = Changelog::all()->count();
        $this->category = Category::all()->count();
        $this->api = Api::all()->count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}