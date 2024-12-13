<?php

namespace App\Livewire\Branchcontroller;

use Livewire\Component;
use App\Models\Branch;
class BranchComponent extends Component
{
    public function delete($id)
    {
        Branch::find($id)->delete();


    }
    public function editBranch($itemId)
    {
       
        $this->dispatch('openModal', $itemId);
    }
    public function render()
    {
        return view('livewire.branches.branchtable',[
            'branches' => Branch::all(),
            ]);
    }
}
