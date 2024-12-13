<?php

namespace App\Livewire\Usercontroller;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class UpdateUserModal extends Component
{
    public $userId;
    public $name;
    public $email;
    public $role_id;
    public string $password = '';
    public string $password_confirmation = '';
    public $isOpen = false;

   

    // Listen for the openModal event
    protected $listeners = ['openModal'];

    // Method to open the modal and load the user data
    public function openModal($userId)
    {
        $this->userId = $userId;
        $user = User::find($userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->role_id;
        

        // Set the modal to open
        $this->isOpen = true;
    }

    
    public $roles;

    public function mount()
    {
        
        // Load available roles for the dropdown
        $this->roles = Role::all();
    }
    // Method to close the modal
    public function closeModal()
    {
        $this->isOpen = false;
    }
    
    // Method to update the user data
    public function updateUser()
    {
        $user = User::find($this->userId);
        if($user->email == $this->email){
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'role_id' => ['required', 'int', 'max:200'],
            ]);
        }else{
            $validated = $this->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
                'role_id' => ['required', 'int', 'max:200'],
            ]);
        }
        
        $validated['password'] = Hash::make($validated['password']);

        
        $user->name = $this->name;
        //Check Email Duplicate
        
        $user->email = $this->email;
        $user->role_id = $this->role_id;
        $user->password = $validated['password'];
        $user->save();

        session()->flash('message', 'User updated successfully!');

        $this->closeModal();

        $this->redirect(route('usermanagement', absolute: false), navigate: true);
    }
    public function render()
    {
        return view('livewire.usermanagement.update-user-modal');
    }
}
