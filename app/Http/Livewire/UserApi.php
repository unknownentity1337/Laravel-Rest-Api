<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserApi extends Component
{

    public $api;

    public function mount()
    {
        $this->api = Auth::user()->api_key;
    }

    public function render()
    {
        return view('livewire.user-api');
    }

    public function getRules()
    {
        return $rules = ['api' => 'required|alpha_dash'];
    }

    public function updateApiInformation()
    {
        $this->resetErrorBag();
        $this->validate();
        if (Auth::user()->status == "Free") {
            toastr()->error('Only For Premmium/Vip User!');
        } else {
            User::where('id', Auth::user()->id)->update(['api_key' => $this->api]);
            toastr()->success('Successfully Change Api Key');
            $this->emit('refresh-navigation-dropdown');
        }
    }
}