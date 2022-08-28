<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $user;
    public $userId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'user.email' => 'required|email|unique:users,email,' . $this->userId
        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'user.name' => 'required|min:3',
            'user.email' => 'required|email|unique:users,email',
            'user.status' => 'required',
            'user.limit_max' => '',
            'user.is_expired' => '',
            'user.expired_at' => '',
            // 'user.limit_count' => 'required',
        ], $rules);
    }

    public function createUser()
    {
        $this->resetErrorBag();
        $this->validate();
        $password = $this->user['password'];
        $status = $this->user['status'];
        if (!empty($password)) {
            $this->user['password'] = Hash::make($password);
        }
        if ($status == "Premium") {
            $this->user['limit_max'] = env("LIMIT_PREMIUM_REQUEST");
        } elseif ($status == "Vip") {
            $this->user['limit_max'] = env("LIMIT_VIP_REQUEST");
        } else {
            $this->user['limit_max'] = env("LIMIT_FREE_REQUEST");
        }
        User::create($this->user);
        $this->emit('saved');
        $this->reset('user');
    }

    public function updateUser()
    {
        $this->resetErrorBag();
        $this->validate();
        if ($this->user->expired_at == "NULL") {
            $this->user['expired_at'] = NULL;
        }
        $status = $this->user['status'];
        if ($status == "Premium") {
            $val = $this->user['limit_max'] = env("LIMIT_PREMIUM_REQUEST");
        } elseif ($status == "Vip") {
            $val = $this->user['limit_max'] = env("LIMIT_VIP_REQUEST");
        } else {
            $val = $this->user['limit_max'] = env("LIMIT_FREE_REQUEST");
        }
        User::query()
            ->where('id', $this->userId)
            ->update([
                "name" => $this->user->name,
                "email" => $this->user->email,
                "status" => $this->user->status,
                "limit_max" => $val,
                // "limit_count" => $this->user->limit_count,
                "is_expired" => $this->user->is_expired,
                "expired_at" => $this->user->expired_at
            ]);

        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->user && $this->userId) {
            $this->user = User::find($this->userId);
            $this->user['expired_at'] = $this->user->expired_at ? $this->user->expired_at : 'False';
        }
        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}