<?php

namespace App\Livewire\Branchcontroller;

use Livewire\Component;
use App\Models\Branch;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class UpdateBranchModal extends Component
{
    public string $branch_name = '';
    public string $branch_desc = '';
    public $branch_id;
    public $updatedSuccess;

    public $isOpen = false;
    protected $listeners = ['openModal'];
    
    public function closeModal()
    {
        
       
        $this->isOpen = false;
    }
    public function openModal($branch_id)
    {
        $this->branch_id = $branch_id;
        $branch = Branch::find($branch_id);
        $this->branch_name = $branch->branch_name;
        $this->branch_desc = $branch->branch_desc;


        // Set the modal to open
        $this->isOpen = true;
    }

    public function updateBranch(){
        if (!$this->isOpen){
            return;

        }
        $branch = Branch::find($this->branch_id);
        $validated = $this->validate([
            'branch_name' => ['required', 'string', 'max:255'],
            'branch_desc' => ['required', 'string', 'max:255'],
        ]);

        $branch->branch_name = $this->branch_name;
        $branch->branch_desc = $this->branch_desc;
        $branch->user_id = auth()->user()->id;
        $branch->save();
        
        

        $this->closeModal();
        session()->flash('message', 'Branch updated successfully!');


        $this->redirect(route('branch', absolute: false), navigate: true);

    }

    public function render()
    {
        return view('livewire.branches.update-branch-modal');
    }
}
