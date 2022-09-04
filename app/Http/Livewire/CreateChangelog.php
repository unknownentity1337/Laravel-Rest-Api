<?php

namespace App\Http\Livewire;

use App\Models\Changelog;
use Livewire\Component;

class CreateChangelog extends Component
{
    public $changelog;
    public $content;
    public $changelogId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = [
            'changelog.title' => 'required',
            'content' => 'required'
        ];

        return $rules;
    }

    public function createChangelog()
    {
        $this->resetErrorBag();
        $this->validate();
        $this->changelog['content'] = $this->content;
        Changelog::create($this->changelog);
        $this->emit('saved');
        $this->reset('changelog');
    }

    public function updateChangelog()
    {
        $this->resetErrorBag();
        $this->validate();
        $this->changelog['content'] = $this->content;
        Changelog::query()
            ->where('id', $this->changelogId)
            ->update([
                "title" => $this->changelog->title,
                "content" => $this->changelog->content,
            ]);
        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->changelog && $this->changelogId) {
            $this->changelog = Changelog::find($this->changelogId);
        }
        $this->button = create_button($this->action, "Changelog");
    }

    public function render()
    {
        return view('livewire.create-changelog');
    }
}