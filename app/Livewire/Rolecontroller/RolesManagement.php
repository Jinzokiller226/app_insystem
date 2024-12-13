<?php

namespace App\Livewire\Rolecontroller;

use Livewire\Component;
use App\Models\Role;
class RolesManagement extends Component
{

    public $roles;
    public function delete($id)
    {
        Role::find($id)->delete();
        return redirect()->route('rolesmanagement');

    }
    public function mount()
    {
        $this->roles = Role::all();
        

    }
   
    public function editRole($itemId)
    {
       
        $this->dispatch('openModal', $itemId);
    }

    public function render()
    {
        return view('livewire.roles.roles-management');
    }
}
