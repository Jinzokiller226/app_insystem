<?php

namespace App\Livewire\Categorycontroller;

use Livewire\Component;
use App\Models\Category;

class Categorytable extends Component
{
    public $categories;
    public function delete($id)
    {
        Category::find($id)->delete();
        return view('livewire.category.categorytable');

    }
    public function editCategory($itemId)
    {
       
        $this->dispatch('openModal', $itemId);
    }
    public function mount()
    {
        $this->categories = Category::all();
        

    }
    public function render()
    {
        return view('livewire.category.categorytable');
    }
}
