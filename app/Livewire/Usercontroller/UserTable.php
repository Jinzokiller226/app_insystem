<?php

namespace App\Livewire\Usercontroller;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserTable extends Component
{

    
   
    
   public $users;
    

    public function mount()
    {
        // $user = Auth::user();
        // if (!$user || $user->roles()->is_admin !== '0') {
        //     // Redirect to another route if the user does not meet the condition
        //     return redirect()->route('dashboard')->with('error', 'Unauthorized access');
        // }
        $user = Auth::user();
       foreach ($user->roles as $role){
            if (!$user || $role->is_admin !== 1) {
                // Redirect to another route if the user does not meet the condition
                return redirect()->route('dashboard')->with('error', 'Unauthorized access');
            }
       }

        $this->users = User::all();
        

    }
    public function editUser2($itemId)
    {
       
        $this->dispatch('openModal', $itemId);
    }
  
    public function delete($id)
    {
        User::find($id)->delete();


    }
    public function render()
    {
        return view('livewire.usermanagement.user-table');

 
    }
}