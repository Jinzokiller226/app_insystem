
<div>
<button type="button" wire:click="openAddModal"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80" >Add Supplier</button>


   
    @if (session()->has('message'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- THIS IS ADD MODAL -->
    @if($isOpen)
  
    <div class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  "  tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
                <form wire:submit.prevent="register">
                    <!-- Name -->
                    <div>
                        <x-input-label for="supplier_name" :value="__('Supplier Name')" />
                        <x-text-input wire:model="supplier_name" id="supplier_name" class="block mt-1 w-full" type="text" name="supplier_name" required autofocus autocomplete="Supplier Name" />
                        <x-input-error :messages="$errors->get('supplier_name')" class="mt-2" />
                    </div>

                
                    <div class="mt-4">
                        <x-input-label for="supplier_desc" :value="__('Supplier Address')" />
                        <x-text-input wire:model="supplier_desc" id="supplier_desc" class="block mt-1 w-full" type="text"   name="supplier_desc" required  autocomplete="Supplier Address" />
                        <x-input-error :messages="$errors->get('supplier_desc')" class="mt-2" />
                    </div>
                
                    <div class="mt-4">
                        <x-input-label for="supplier_contact_person" :value="__('Contact Person')" />
                        <x-text-input wire:model="supplier_contact_person" id="supplier_contact_person" class="block mt-1 w-full" type="text"   name="supplier_contact_person" required  autocomplete="Contact Person" />
                        <x-input-error :messages="$errors->get('supplier_contact_person')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <x-input-label for="supplier_contact_number" :value="__('Contact Person')" />
                        <x-text-input wire:model="supplier_contact_number" id="supplier_contact_number" class="block mt-1 w-full" type="number"   name="supplier_contact_number" required  autocomplete="Contact Number" />
                        <x-input-error :messages="$errors->get('supplier_contact_number')" class="mt-2" />
                    </div>
                    @if(auth()->user()->role->is_admin == 1)
                    <div class="mt-4">
                        <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="branch_id" wire:model="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option wire:key="addbranchonsupplier-{{$branch['id']}}"value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                    
                        </div>
                
                    
                    @endif
                    
                        
                

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                            {{ __('Already registered?') }}
                        </a> -->
                        <button wire:click="closeAddModal"
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                        formnovalidate
                        >

                            {{ __('Close') }}</button>
                        <button wire:click="openAddModal" 
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                            >
                            {{ __('Add Supplier') }}
                        </button>
                        
                    </div>
                </form>
        </div>
    </div>
        @endif
        <!-- THIS IS ADD MODAL END-->

        <!-- THIS IS TABLE ON TAB -->
<div class="relative overflow-x-auto ">
    <table class="@if($isOpen) hidden @else @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Supplier name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Supplier Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact Person
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Contact Number
                    </th>
                    @if(auth()->user()->role->is_admin == 1)
                    <th scope="col" class="px-6 py-3">
                        Branch
                    </th>
                    @endif
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                    @if(auth()->user()->role->is_admin == 1)
                        <tr wire:key="supplier_table-{{$supplier['id']}}" class="max-w-auto odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$supplier->supplier_name}}
                            
                        </th>
                        
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_desc}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_contact_person}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_contact_number}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach($supplier->branches as $branch)
                            {{$branch->branch_name}}
                        @endforeach
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-blue-900 whitespace-nowrap dark:text-white">
                        <button type="button" wire:click="delete({{$supplier->id}})">Delete</button> | <button type="button" wire:click="editSupplier({{$supplier->id}})">Update</button> 
                            
                        </th>
                        </tr>
                    @else
                        @if($supplier->branch_id == $user->role->branch_id )
                        <tr  class="max-w-auto odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$supplier->supplier_name}}
                            
                        </th>
                        
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_desc}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_contact_person}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$supplier->supplier_contact_number}}   
                            
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-blue-900 whitespace-nowrap dark:text-white">
                        <button type="button" wire:click="delete({{$supplier->id}})">Delete</button> | <button type="button" wire:click="editSupplier({{$supplier->id}})">Update</button> 
                            
                        </th>
                        </tr>
                
                        @endif
                    @endif
                       
                @endforeach
                
            </tbody>
        </table>
    
        @livewire('suppliercontroller.update-supplier-modal')
    </div>
</div>


