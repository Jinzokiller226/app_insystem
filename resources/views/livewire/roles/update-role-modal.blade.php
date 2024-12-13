<div>
    <div class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  " id="updateRoleModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <form wire:submit="updateRole">
        <!-- Name -->
        <div>
            <x-input-label for="role_name" :value="__('Role Name')" />
            <x-text-input wire:model="role_name" id="role_name" class="block mt-1 w-full" type="text" name="role_name" required autofocus autocomplete="Role name" />
            <x-input-error :messages="$errors->get('role_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="role_desc" :value="__('Description')" />
            <x-text-input wire:model="role_desc" id="role_desc" class="block mt-1 w-full"  name="role_desc" required  autocomplete="Role Description" />
            <x-input-error :messages="$errors->get('role_desc')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                <select
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                id="branch_id" wire:model="branch_id" required>
                    <option value="">Select Role</option>
                    @foreach($branches as $branchCombo)

                        <option value="{{ $branchCombo->id }}">{{ $branchCombo->branch_name }}</option>
                    @endforeach
                </select>
                @error('branch_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mt-4">
        <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Permission:</label>
            <label
            class="block font-medium text-sm text-gray-700 dark:text-gray-300" 
            >Admin:
            @if ($is_admin == 1)
            <input checked type="checkbox" wire:model="is_admin"  
            value = 1   
           

             />
           
            
             @endif
            @if ($is_admin == 0)
             <input  type="checkbox" wire:model="is_admin"  
            value = 0   
           

             />
             @endif
            Employee:
            @if ($is_employee == 1 )
            <input type="checkbox" checked wire:model="is_employee"  checked value = 1 />
            </label>
            
            @endif

            @if ($is_employee == 0 )
            <input type="checkbox"  wire:model="is_employee"   value = 0 />
            </label>
            
            @endif
            
           
        </div>
        
            
       

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a> -->
            <button id="closeModal" wire:click="closeModal"
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
            formnovalidate
            >

                {{ __('Close') }}</button>
            <x-primary-button class="ms-4" >
                {{ __('Update Role') }}
            </x-primary-button>
            
        </div>
    </form>
                

        </div>
    </div>
</div>
