<?php

namespace App\Livewire\Rolecontroller;
use App\Models\Role;
use App\Models\Branch;
use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
class UpdateRoleModal extends Component
{
    public $branches;
    public $isOpen = false;
    protected $listeners = ['openModal'];
    public $role_id;
    public $role_name;
    public $role_desc;
    public $is_admin;
    public $is_employee;
    public $updateSuccess;
    public $branch_id;
    public function mount()
     {
         
         // Load available roles for the dropdown
         $this->branches = Branch::all();
     }
    public function closeModal()
    {
        
        $this->isOpen = false;
    }
    public function openModal($role_id)
    {
        $this->role_id = $role_id;
        $role = Role::find($role_id);
        $this->role_name = $role->role_name;
        $this->role_desc = $role->role_desc;
        $this->branch_id = $role->branch_id;
        $this->is_admin = $role->is_admin;
        $this->is_employee = $role->is_employee;


        // Set the modal to open
        $this->isOpen = true;
    }

    public function updateRole(){

        if(!$this->isOpen){
            return;
        }
        $role = Role::find($this->role_id);
        $validated = $this->validate([
            'role_name' => ['required', 'string', 'max:255'],
            'role_desc' => ['required', 'string', 'max:255'],
        ]);

        $role->role_name = $this->role_name;
        $role->role_desc = $this->role_desc;
        $role->branch_id = $this->branch_id;
        $role->is_admin = $this->is_admin;
        $role->is_employee = $this->is_employee;
        $role->user_id = auth()->user()->id;
        
        $role->save();
        session()->flash('message', 'Role updated successfully!');
        
        $this->closeModal();
      
        $this->redirect(route('rolesmanagement', absolute: false), navigate: true);
    }

    public function render()
    {
        return view('livewire.roles.update-role-modal');
    }
}
