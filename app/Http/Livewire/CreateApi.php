<?php

namespace App\Http\Livewire;

use App\Models\Api;
use App\Models\Category;
use Livewire\Component;
use PhpParser\Node\Expr\Cast;

class CreateApi extends Component
{
    public $api;
    public $category;
    public $apiId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = [
            'api.title' => 'required',
            'api.description' => 'required',
            'api.category_id' => 'required',
            'api.method' => 'required',
            'api.status' => 'required',
            'api.parameter' => 'required'
            // 'api.docs_id' => 'required'
        ];
        return $rules;
    }

    public function createApi()
    {
        $this->resetErrorBag();
        $this->validate();
        Api::create($this->api);
        $this->emit('saved');
        $this->reset('api');
    }

    public function updateApi()
    {
        $this->resetErrorBag();
        $this->validate();
        Api::query()
            ->where('id', $this->apiId)
            ->update([
                "title" => $this->api->title,
                "description" => $this->api->description,
                "category_id" => $this->api->category_id,
                "method" => $this->api->method,
                "parameter" => $this->api->parameter,
                "status" => $this->api->status,
                // "docs_id" => $this->api->docs_id
            ]);
        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->api && $this->apiId) {
            $this->api = Api::find($this->apiId);
        }
        $this->category = Category::all();
        $this->button = create_button($this->action, "Api");
    }

    public function render()
    {
        return view('livewire.create-api');
    }
}