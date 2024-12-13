<?php

namespace App\Livewire\SupplierController;

use Livewire\Component;
use App\Models\Branch;
use App\Models\Supplier;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;


class UpdateSupplierModal extends Component
{
    public $isOpen = false;
    protected $listeners = ['openModal'];
    public $branches;
    public $branch_id;
    public $supplier_id;
    public $supplier;
    public $supplier_name ="";
    public $supplier_desc = "";
    public $supplier_contact_person = "";
    public $supplier_contact_number = "";

    public function mount()
     {
         
         // Load available roles for the dropdown
         $this->branches = Branch::all();
     }
     public function closeModal()
    {
       $this->supplier_name = "";
       $this->supplier_desc = "";
       $this->supplier_contact_person = "";
       $this->supplier_contact_number = "";
       $this->branch_id = 0;
        $this->isOpen = false;
        
    }
    public function updateSupplier(){
        if (!$this->isOpen) {
            // Don't submit the form if the modal is closed
            return;
        }
        $supplier = Supplier::find($this->supplier_id);
        $validated = $this->validate([
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_desc' => ['required', 'string', 'max:255'],
            'supplier_contact_person' => ['required', 'string', 'max:255'],
            'supplier_contact_number' => ['required', 'string', 'max:255'],
        ]);
        $supplier->supplier_name = $this->supplier_name;
        $supplier->supplier_desc = $this->supplier_desc;
        $supplier->supplier_contact_person = $this->supplier_contact_person;
        $supplier->supplier_contact_number = $this->supplier_contact_number;
        $supplier->branch_id = $this->branch_id;
        $supplier->user_id = auth()->user()->id;
        $supplier->save();

        $this->closeModal();
        $this->dispatch('success', message: 'Supplier updated successfully!');
      
        $this->redirect(route('inventory', absolute: false), navigate: true);

    }
    public function openModal($id)
    {
       
        $this->supplier_id = $id;
        $supplier = Supplier::find($id);
        $this->supplier_name = $supplier->supplier_name;
        $this->supplier_desc = $supplier->supplier_desc;
        $this->supplier_contact_person = $supplier->supplier_contact_person;
        $this->supplier_contact_number = $supplier->supplier_contact_number;
        $branches = Branch::find($supplier->branch_id);
        $this->branch_id = $branches->id;
       

        // Set the modal to open
        $this->isOpen = true;
    }

    public function render()
    {
        return view('livewire.inventory.update-supplier-modal');
    }
}
