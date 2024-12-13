<div>
    <div wire:key="add-product-{{$product_id}}" x-data="{ isOpen: false }"  class="modal  fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  " id="updateCategoryModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
            <form wire:submit.prevent="updateStock">
            
                    <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                        {{ __('Already registered?') }}
                    </a> -->
                
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    Product Details
                                </h3>
                            
                            </div>
                            <!-- Modal body -->
                            
                            <div class="p-2  ">
                                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                                    Product name: {{$product_name}}
                                </p>
                           
                            </div>
                            <div class="p-2  ">
                                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                                    Product Description: {{$product_desc}}
                                </p>
                           
                            </div>
                            <div class="p-2  ">
                                <p class="text-base leading-relaxed text-black dark:text-gray-400">
                                    @if($product_quantity < 30)
                                    Product Quantity:<span class=" text-red-600  me-2 px-2.5 py-0.5 ">{{$product_quantity}} (pcs)</span>
                                    @else
                                    Product Quantity: {{$product_quantity}} (pcs)
                                    @endif

                                    
                                </p>
                           
                            </div>
                            
                        </div>
                    </div>
                
                    <div class="mt-4">
                        <x-input-label for="product_quantity" :value="__('Add Stock')" />
                        <x-text-input wire:model="product_quantity" id="product_quantity" class="block mt-1 w-full" type="number" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}" placeholder=" "   name="product_quantity" required   />
                        <x-input-error :messages="$errors->get('product_quantity')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                        <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                            {{ __('Already registered?') }}
                        </a> -->
                        <button wire:click="$set('isOpen', false)" 
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                        formnovalidate
                        >

                            {{ __('Close') }}</button>
                        <button wire:click="updateStock"
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                            >
                            {{ __('Add Product') }}
                        </button>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
