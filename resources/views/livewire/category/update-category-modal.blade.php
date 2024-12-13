<div>
    <div   class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  " id="updateCategoryModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <form wire:submit.prevent="updateCategory">
        <!-- Name -->
        <div>
            <x-input-label for="category_name" :value="__('Category Name')" />
            <x-text-input wire:model="category_name" id="category_name" class="block mt-1 w-full" type="text" name="category_name" required autofocus autocomplete="Category name" />
            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="category_desc" :value="__('Category Description')" />
            <x-text-input wire:model="category_desc" id="category_desc" class="block mt-1 w-full"  name="category_desc" required  autocomplete="Category Description" />
            <x-input-error :messages="$errors->get('category_desc')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                <select
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                id="branch_id" wire:model="branch_id" required>
                    <option value="">Select Role</option>
                    @foreach($branches as $branch)
                        @if($branch->id == $branch_id)
                        <option value="{{ $branch->id }}" selected>{{ $branch->branch_name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('branch_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        
        
            
       

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a> -->
            <button id="closeCategoryModal" wire:click="closeCategoryModal" type="button"
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
            formnovalidate
            >

                {{ __('Close') }}</button>
            <x-primary-button  wire:click="updateCategory" class="ms-4" >
                {{ __('Update Category') }}
            </x-primary-button>
            
        </div>
    </form>
                

        </div>
    </div>
</div>
