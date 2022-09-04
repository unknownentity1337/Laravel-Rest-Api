<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    public $category;
    public $categoryId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = [
            'category.title' => 'required',
            'category.icon' => 'required',
            'category.slug' => 'required'
        ];
        return $rules;
    }

    public function createCategory()
    {
        $this->resetErrorBag();
        $this->validate();
        Category::create($this->category);
        $this->emit('saved');
        $this->reset('category');
    }

    public function updateCategory()
    {
        $this->resetErrorBag();
        $this->validate();
        Category::query()
            ->where('id', $this->categoryId)
            ->update([
                "title" => $this->category->title,
                "icon" => $this->category->icon,
                "slug" => Str::of($this->category->title)->slug('-'),
            ]);
        $this->emit('saved');
    }

    public function mount()
    {
        if (!$this->category && $this->categoryId) {
            $this->category = Category::find($this->categoryId);
        }
        $this->button = create_button($this->action, "Category");
    }

    public function render()
    {
        return view('livewire.create-category');
    }

    public function updatedCategoryTitle()
    {
        $this->category['slug'] = Str::of($this->category['title'])->slug('-');
        $this->validateOnly('api.title');
    }
}