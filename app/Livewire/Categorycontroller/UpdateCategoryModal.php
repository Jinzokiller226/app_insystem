<?php

namespace App\Livewire\Categorycontroller;
use App\Models\Category;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UpdateCategoryModal extends Component
{
    public $branches;
    public $isOpen = false;
    protected $listeners = ['openModal'];
    public $category_name;
    public $category_desc;
    public $category_id;
    public $branch_id;
    public $updateSuccess = 0;
    public $category;

    public function mount()
     {
         
         // Load available roles for the dropdown
         $this->branches = Branch::all();
     }
     public function closeCategoryModal()
    {
        $this->category_name = "";
        $this->category_desc = "";
        
      
        $this->isOpen = false;
        
    }
    public function openModal($id)
    {
       
        $this->category_id = $id;
        $category = Category::find($id);
        $this->category_name = $category->category_name;
        $this->category_desc = $category->category_desc;
        $branches = Branch::find($category->branch_id);
        $this->branch_id = $branches->id;
        $updateSuccess = 0;

        // Set the modal to open
        $this->isOpen = true;
    }
    public function updateCategory(){
        if (!$this->isOpen) {
            // Don't submit the form if the modal is closed
            return;
        }
        $category = Category::find($this->category_id);
        $validated = $this->validate([
            'category_name' => ['required', 'string', 'max:255'],
            'category_desc' => ['required', 'string', 'max:255'],
        ]);

        $category->category_name = $this->category_name;
        $category->category_desc = $this->category_desc;
        $category->branch_id = $this->branch_id;
        $category->user_id = auth()->user()->id;
        $category->save();
        
        $this->closeCategoryModal();
        session()->flash('message', 'Category updated successfully!');

      
        $this->redirect(route('categorymanagement', absolute: false), navigate: true);
    }


    public function render()
    {
        return view('livewire.category.update-category-modal');
    }
}
