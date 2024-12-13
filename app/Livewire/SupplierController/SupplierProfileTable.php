<?php

namespace App\Livewire\SupplierController;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
class SupplierProfileTable extends Component
{
    public $suppliers;
    public $user;
    public string $supplier_name = '';
    public string $supplier_desc = '';
    public string $supplier_contact_person = '';
    public string $supplier_contact_number = '';
    public $branch_id;
    public $branches;
    public $isOpen = false;


    
    public function delete($id){
        Supplier::find($id)->delete();
        return redirect()->route('inventory');
    }
    public function closeAddModal(){
        $this->supplier_name = "";
        $this->supplier_desc = "";
        $this->supplier_contact_person = "";
        $this->supplier_contact_number = "";

        $this->isOpen = false;

    }
    public function openAddModal(){
        $this->isOpen = true;
   

    }
   
    
    public function register(): void
    {
        if (!$this->isOpen) {
            
            return;
        }

        $validated = $this->validate([
            'supplier_name' => ['required', 'string', 'max:255'],
            'supplier_desc' => ['required', 'string', 'max:255'],
            'supplier_contact_person' => ['required', 'string', 'max:255'],      
            'supplier_contact_number' => ['required', 'string', 'max:255'],              
            
        ]);
      
        if(auth()->user()->role->is_admin != 1){
            $validated['branch_id'] = auth()->user()->role->branch_id;
        }else{
            $validated['branch_id'] = $this->branch_id;
        }
      
        $validated['user_id'] = auth()->user()->id;

        event(new Registered($supplier = Supplier::create($validated)));
        $this->dispatch('success', message: 'Supplier Added successfully!');
        $this->redirect(route('inventory', absolute: false), navigate: true);
    }
    public function mount()
    {
        $this->user = Auth::user();
        $this->suppliers = Supplier::all();
        $this->branches = Branch::all();
        

    }
    public function editSupplier($itemId)
    {
       
        $this->dispatch('openModal', $itemId);
    }
    public function render()
    {
        return view('livewire.inventory.supplier-profile-table');
    }
}
