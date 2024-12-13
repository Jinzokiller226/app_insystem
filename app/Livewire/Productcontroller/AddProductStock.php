<?php

namespace App\Livewire\Productcontroller;

use Livewire\Component;
use App\Models\Product;

class AddProductStock extends Component
{
    protected $listeners = ['openModal'];
    public $isOpen = false;
    public $addedStock;
    public $product_id;
    public $product;
    public $products;
    public $product_name;
    public $product_desc;
    public $product_quantity;
 
  
    public function openModal($id)
    {
       
       
       
        $this->product_id = $id;
        $product = Product::find($id);
        $this->product_name = $product->product_name;
        $this->product_desc = $product->product_desc;
        $this->product_quantity = $product->product_quantity;

        // Set the modal to open
        $this->isOpen = true;
    }
    public function resetState()
    {
    $this->reset(); // Reset component state if needed
    }
    public function closeUpdateStockModal(){
        $this->product_quantity = 0;

        $this->isOpen = false;
        
    }
 
       
    
    public function updateStock()
    {
       
        if(!$this->isOpen){
            return;
        }
        $product = Product::find($this->product_id);
        $product->product_quantity = $product->product_quantity + abs($this->product_quantity);
        $product->save();
     
        $this->dispatch('refreshProductAfterUpdate',message: 'Add Stock successfully!');
        
        $this->closeUpdateStockModal();
        $this->resetState();

        // Set the modal to open
        
    }
    public function render()
    {
        return view('livewire.inventory.product.add-product-stock');
    }
}
