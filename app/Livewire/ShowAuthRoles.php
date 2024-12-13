<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class ShowAuthRoles extends Component
{
    public $role;

    public function mount(){
        $user = Auth::user();
        if($user){
            $this->role = $user->role->is_admin;
        }
    }
    public function render()
    {
        return view('livewire.layout.navigation');
    }
}
