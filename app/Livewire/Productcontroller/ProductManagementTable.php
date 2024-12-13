<?php

namespace App\Livewire\Productcontroller;

use Livewire\Component;
use App\Models\Product;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\ProductSettings;

use App\Livewire\VerticalTabs;
use Livewire\Attributes\On; 
use Illuminate\Auth\Events\Registered;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\DB;
class ProductManagementTable extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $products;
    
    public $countResult;
    public $isOpen;
    public $isUpdateOpen;
    public $product_id;
    
    public string $product_name;
    public string $product_desc;
    public string $product_price;
    public int $product_quantity = 0;
    public $category_id;
    public $branch_id;
    public $supplier_id;
    public $branches;
    public $categories;
    public $suppliers;
    public $ps_dangerlevel;


    public $selectedTab = 'tab2';

    public $searchby = 'product_name';
    public $search = '';
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction
    protected $queryString = ['search', 'sortField', 'sortDirection'];
    public $countData;



    #[On('refreshProductAfterUpdate')] 
    public function refreshProductAfterUpdate($message){
        session()->flash('message',$message);
        $this->isOpen = false;
        
        $this->refreshTable();

           
    
    }
   public function refreshTable(){
        $this->countResult = Product::all()->count();
        
        $this->products = Product::all(); 
        $this->branches = Branch::all();
        $this->categories = Category::all();
        $this->suppliers = Supplier::all();
        $productsetting = ProductSettings::all();
            foreach($productsetting as $data){
                $this->ps_dangerlevel = $data->ps_dangerlevel;
            }

   }
    
    public function addStock($itemId){
        $this->dispatch('openModal', $itemId);
    }
    public function updateDetails($itemId){
        $this->dispatch('openUpdateModal', $itemId);
    }
    
    
    public function closeAddModal(){
        $this->product_name = "";
        $this->product_desc = "";
        $this->product_price = "";
        $this->product_quantity = 0;

        $this->isOpen = false;

    }
    public function openAddModal(){
        $this->isOpen = true;
   

    }
    public function closeModal()
    {
        $this->isOpen = false;
        $this->isUpdateOpen = false;
    }
   
    
    public function delete($id){
        
        if(!$id){
            return;
        }else{
            Product::find($id)->delete();
       
            $this->refreshTable();
    
            session()->flash('message', 'Product Deleted successfully!');
            
        }
      
      
    }
    public function register(){
        if (!$this->isOpen) {
            
            return;
        }else{
            $validated = $this->validate([
                'product_name' => ['required', 'string', 'max:255'],
                'product_desc' => ['required', 'string', 'max:255'],
                'product_price' => ['required', 'string', 'max:255'],      
            ]);
            $validated['product_quantity'] = $this->product_quantity;
            $validated['branch_id'] = $this->branch_id;
            $validated['category_id'] = $this->category_id;
            $validated['supplier_id'] = $this->supplier_id;
            $validated['user_id'] = auth()->user()->id;
    
            
            event(new Registered($products = Product::create($validated)));
         
           
        }
           
        
      
            
            $this->closeModal();
            $this->reset();
            $this->refreshTable();
          

            // $this->dispatch('closeModal')->to(ProductManagementTable::closeAddProductModal());
            session()->flash('message', 'Product Added successfully!');

    }
    public function openUpdateModal($id)
    {
       
       
       
        $this->product_id = $id;
        $product = Product::find($id);
        $this->product_name = $product->product_name;
        $this->product_desc = $product->product_desc;
        $this->product_price = $product->product_price;
        $this->branch_id = $product->branch_id;
        $this->category_id = $product->category_id;
        $this->supplier_id = $product->supplier_id;


        // Set the modal to open
        $this->isUpdateOpen = true;
    }
    public function updateProductDetails(){
       
        if(!$this->isUpdateOpen){
            return;
        }else{
            $product = Product::find($this->product_id);
            $validated = $this->validate([
                'product_name' => ['required', 'string', 'max:255'],
                'product_desc' => ['required', 'string', 'max:255'],
                'product_price' => ['required', 'string', 'max:255'],
                'branch_id' => ['required', 'int'],
                'category_id' => ['required', 'int'],
                'supplier_id' => ['required', 'int'],
            ]);
    
            $product->product_name = $this->product_name;
            $product->product_desc = $this->product_desc;
            $product->product_price = $this->product_price;
            $product->branch_id = $this->branch_id;
            $product->category_id = $this->category_id;
            $product->supplier_id = $this->supplier_id;
            $product->save();
    
        
           
          
            $this->dispatch('refreshProductAfterUpdate',message: 'Product details update successfully!');
             $this->reset();
             $this->isUpdateOpen = false;
            $this->refreshTable();    
        }
       


    }
    
    public function mount(){
        
        $this->isOpen = false;
        
            $this->countResult = Product::all()->count();
      
            $this->products = Product::all(); 
            $this->branches = Branch::all();
            $this->categories = Category::all();
            $this->suppliers = Supplier::all();
            $productsetting = ProductSettings::all();
            foreach($productsetting as $data){
                $this->ps_dangerlevel = $data->ps_dangerlevel;
            }

       
    }
    public function searchproduct(){

        $product = Product::query();
        
       
            if($this->searchby == "product_name"){
                if ($this->search) {
                $product->whereRaw('LOWER(products.product_name) like ?', ['%' . strtolower($this->search) . '%']);
                }
            }
            elseif($this->searchby == "product_category"){
                if ($this->search) {
                $product->join('categories', 'products.category_id', '=', 'categories.id')
                ->select('products.*', 'categories.category_name')
                ->whereRaw('LOWER(categories.category_name) like ?', ['%' . strtolower($this->search) . '%'])
                ->distinct()
                ->get();
                }
            }
            elseif($this->searchby == "product_supplier"){
                if ($this->search) {
                
                $product->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
                        ->select('products.*', 'suppliers.supplier_name')
                        ->whereRaw('LOWER(suppliers.supplier_name) like ?', ['%' . strtolower($this->search) . '%'])
                        ->distinct()
                        ->get();

                $this->sortField = "products.id";
                }
                
                

            }
            elseif($this->searchby == "product_branch_admin"){
                if ($this->search) {
                $product->join('branches', 'products.branch_id', '=', 'branches.id')
                        ->select('products.*', 'branches.branch_name')
                        ->whereRaw('LOWER(branches.branch_name) like ?', ['%' . strtolower($this->search) . '%'])
                        ->distinct()
                        ->get();
                }
            }
            
        
      
            $product->orderBy($this->sortField, $this->sortDirection);
            
            
           $this->products = $product->get();
               


    }
    public function render()
    {
        
       

     
        
        return view('livewire.inventory.product.project-management-table');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
