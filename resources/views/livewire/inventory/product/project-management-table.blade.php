
<div>



  <!-- Search bar -->
  



    <div class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
         @if($isOpen)
            <form wire:submit.prevent="register">
                    <!-- Name -->
                    <div>
                        <x-input-label for="product_name" :value="__('Product Name')" />
                        <x-text-input wire:model="product_name" id="product_name" class="block mt-1 w-full" type="text" name="product_name" required autofocus autocomplete="Product Name" />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>

                
                    <div class="mt-4">
                        <x-input-label for="product_desc" :value="__('Product Description')" />
                        <x-text-input wire:model="product_desc" id="product_desc" class="block mt-1 w-full" type="text"   name="product_desc" required  autocomplete="Product Description" />
                        <x-input-error :messages="$errors->get('product_desc')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="product_price" :value="__('Product Price')" />
                        <x-text-input wire:model="product_price" id="product_price" class="block mt-1 w-full" type="number"   name="product_price" required  autocomplete="Product Price(ea)" />
                        <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                    </div>
                    @if(auth()->user()->role->is_admin == 1)
                    <div class="mt-4">
                        <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="branch_id" wire:model="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option wire:key="branch-id-{{$branch->id}}" value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                    <div class="mt-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Category</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="category_id" wire:model="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option wire:key="category-id-{{$category->id}}" value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                    <div class="mt-4">
                        <label for="supplier_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Supplier</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="supplier_id" wire:model="supplier_id" required>
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option wire:key="supplier-id-{{$supplier->id}}" value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                
                    
                    @endif
                    
                        
                

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                            {{ __('Already registered?') }}
                        </a> -->
                        <button wire:click="$set('isOpen', false)" 
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                        formnovalidate
                        >

                            {{ __('Close') }}</button>
                        <button
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                            >
                            {{ __('Add Product') }}
                        </button>
                        
                    </div>
                </form>
            @endif

    
        
        </div>
        </div>
        
        <div class="modal fade @if($isUpdateOpen) show  @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-5  "  data-bs-toggle="modal"  tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isUpdateOpen) fixed @else none @endif;">
            <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
            @if($isUpdateOpen)    
            <form wire:submit.prevent="updateProductDetails">
                    <!-- Name -->
                    <div>
                        <x-input-label for="product_name" :value="__('Product Name')" />
                        <x-text-input wire:model="product_name" id="product_name" class="block mt-1 w-full" type="text" name="product_name" required autofocus autocomplete="Product Name" />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>

                
                    <div class="mt-4">
                        <x-input-label for="product_desc" :value="__('Product Description')" />
                        <x-text-input wire:model="product_desc" id="product_desc" class="block mt-1 w-full" type="text"   name="product_desc" required  autocomplete="Product Description" />
                        <x-input-error :messages="$errors->get('product_desc')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="product_price" :value="__('Product Price')" />
                        <x-text-input wire:model="product_price" id="product_price" class="block mt-1 w-full" type="number"   name="product_price" required  autocomplete="Product Price(ea)" />
                        <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                    </div>
                    @if(auth()->user()->role->is_admin == 1)
                    <div class="mt-4">
                        <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="branch_id" wire:model="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option wire:key="branch-id-{{$branch->id}}" value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                    <div class="mt-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Category</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="category_id" wire:model="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option wire:key="category-id-{{$category->id}}" value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                    <div class="mt-4">
                        <label for="supplier_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Supplier</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="supplier_id" wire:model="supplier_id" required>
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option wire:key="supplier-id-{{$supplier->id}}" value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                
                    
                    @endif
                    <div class="mt-4">

                        <button wire:click="$set('isUpdateOpen', false)" 
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                        formnovalidate
                        >

                            {{ __('Close') }}</button>
                        <button  
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                            >
                            {{ __('Update Product') }}
                        </button>
                        
                    </div>
                </form>
                @endif
            </div>
        </div>
<!-- THIS IS ADD PRODUCT MODAL -->
   
                    
<!-- ADD PRODUCT MODAL END HERE -->
<div class="relative overflow-x-auto ">
<x-text-input type="text" wire:model.live.denounce.500ms="search" placeholder="Search" class="mb-4 p-2 border rounded" />
<table  id="default-table" class="@if($isOpen == true || $isUpdateOpen == true) hidden @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <button wire:click="sortBy('product_name')" >
                        <span class="flex items-center">
                        Product name
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                        </span>
                        
                        
                       
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <button  wire:click="sortBy('product_price')">
                            
                        
                        <span class="flex items-center">
                                    Product Price
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                            </svg>
                         </span>
                         </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <button  wire:click="sortBy('product_quantity')">
                        <span class="flex items-center">
                            Product Quantity
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                </svg>
                        </span>
                        
                        </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                    <button  wire:click="sortBy('category_id')">
                        <span class="flex items-center">
                            Category
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                            </span>
                        
                    </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                    <button  wire:click="sortBy('supplier_id')">
                        <span class="flex items-center">
                            Supplier
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                            </span>
                        
                    </button>
                    </th>
                    
                    
                    <th scope="col" class="px-6 py-3">
                    <button  wire:click="sortBy('branch_id')">
                        <span class="flex items-center">
                            Branch
                                <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                                    </svg>
                            </span>
                        
                    </button>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Added By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
             @if($countResult >= 1)
                @foreach ($products as $product)
                   
                    <tr wire:key="product_table-{{$product->id}}"  class="max-w-auto odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                     <!-- if low product quantity starts here -->
                  
                        <th  scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$product->product_name}}
                                    
                        </th>
                    
                        <th  scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$product->product_desc}}
                                    
                        </th>
                  
                        <div class="flex items-center">
                        <th  scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            
                                
                                    <svg class="inline-flex " fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="-226.44 -226.44 1064.88 1064.88" xml:space="preserve" stroke="#000000" stroke-width="2.448" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#bfbfbf" stroke-width="1.224"></g><g id="SVGRepo_iconCarrier"> <g> <g> <g> <path d="M509.279,84.295H454.7C426.357,34.036,372.486,0,310.788,0S195.223,34.036,166.881,84.295h-64.16v51.333h45.635 c-1.735,9.579-2.692,19.426-2.692,29.496c0,2.957,0.86,21.837,0.86,21.837h-43.804v51.333h43.12V612h51.333V285.624 c30.8,27.724,69.7,44.629,113.271,44.629c64.786,0,121.292-37.521,148.32-91.958h50.514v-51.333h-34.852 c0.949-7.149,1.489-14.429,1.489-21.837c0-10.07-0.957-19.917-2.692-29.496h36.055V84.295L509.279,84.295z M424.584,165.125 c0,7.47-0.744,14.765-2.126,21.837h-223.36c-0.992-5.125-1.659-10.371-1.94-15.726c-0.104-1.996-0.158-4.051-0.158-6.111 c0-10.201,1.37-20.083,3.899-29.496h219.786C423.214,145.041,424.584,154.923,424.584,165.125z M310.788,278.92 c-34.9,0-66.249-15.741-87.167-40.625H397.85C376.959,263.111,345.69,278.92,310.788,278.92z M230.789,84.295 c20.57-20.361,48.84-32.962,80-32.962c31.163,0,59.432,12.602,80.004,32.962H230.789z"></path> </g> </g> </g> </g></svg>
                                               
                                   
                                {{$product->product_price}}       
                                                             
                        </th>
                        </div>
                       
                       
                    
                        
                        <th scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="flex items-center">
                                @if($product->product_quantity < $ps_dangerlevel)       
                                <div  class="inline-block w-4 h-4 mr-2 bg-red-400 rounded-full"></div>{{$product->product_quantity}} 
                                @else
                                <div  class="inline-block w-4 h-4 mr-2 bg-green-400 rounded-full"></div>{{$product->product_quantity}}  
                                @endif
                            </div>
                        </th>
                     
                        <th scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach($product->categories as $category)
                                    <div wire:key="category-{{$category->id}}">
                                        {{$category->category_name}}
                                    </div>
                                    @endforeach
                                    
                        </th>
                        <th scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach($product->suppliers as $supplier)
                                    <div wire:key="supplier-{{$supplier->id}}">
                                        {{$supplier->supplier_name}}
                                    </div>
                                    @endforeach
                                    
                        </th>
                        <th scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach($product->branches as $branch)
                                    <div wire:key="branch-{{$branch->id}}">
                                        {{$branch->branch_name}}
                                    </div>
                                    @endforeach
                                    
                        </th>
                     
                        <th scope="row" class="@if($product->product_quantity < $ps_dangerlevel) bg-red-200 @endif px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @foreach($product->users as $user)
                                    <div wire:key="user-{{$user->id}}">
                                        {{$user->name}}
                                    </div>
                                    @endforeach
                                    
                        </th>
                        <!-- if low product quantity ends here -->
                       

                        <th  scope="row" class="px-6 py-4 font-medium  whitespace-nowrap dark:text-white">
                            @if (auth()->user()->role->is_admin == 1)
                        <button class="text-green-400" type="button"   wire:click="delete({{$product->id}})">Delete</button>  |
                        <button class="text-blue-400" type="button"  wire:click="openUpdateModal({{$product->id}})">Update</button> |
                        <button class="text-green-400" type="button"  @click="isOpen = true" wire:click="$dispatch('openModal', { id:{{$product->id}} })"  >Add Stock</button>
                        
                            @endif
                             
                                    
                        </th>
                    </tr>
             
             
                    
                   
                @endforeach
             @else
                    <tr  class="max-w-auto odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{__('No Product Registered')}} 
                                    
                        </th>
                    </tr>
             @endif
            </tbody>
    </table>
   
            <div class="py-4 px-3">
                <div class="flex">
                    <div class="flex space-x-4 items-center mb-3">
                        <label > Per page</label>
                        <select wire:model.live.denounce:300ms="perPage"  class="rounded">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                        <div class="@if($isOpen) hidden @endif">
                        {{$products->links()}}
                        </div>
                    </div>
                </div>   
            </div>
    
    
   
    <livewire:Productcontroller.add-product-stock/>   

</div>      
