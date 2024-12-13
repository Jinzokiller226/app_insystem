<?php

namespace App\Livewire;

use Livewire\Component;

class PermissionComponent extends Component
{
    
    public $isAdmin = false;
    public $isEmployee = false;
    public function toggleCheckbox()
    {
    $this->isAdmin = !$this->isAdmin;  // Toggle the checkbox state
    }
    public function toggleCheckbox2()
    {
    $this->isEmployee = !$this->isEmployee;  // Toggle the checkbox state
    }
    
    public function render()
    {
        return view('livewire.components.permission-component');
    }
}
