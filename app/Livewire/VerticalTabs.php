<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On; 

class VerticalTabs extends Component
{
  
    public $selectedTab = "tab1"; // Default tab
    public $user;
    public $isOpen;

  
   
    // Switch tab method
    
    public function mount(){
        $this->user = Auth::user();
        $this->isOpen = 'false';
    }
    
    
    public function selectTab($tab)
    {   
       

       
            $this->selectedTab = $tab;

     
       
    }
    public function toggleModal()
    {
        $this->isOpen = !$this->isOpen;
    }
   
    public function render()
    {
        return view('livewire.components.vertical-tabs');
    }
}
