<div>
    <div class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  " id="updateRoleModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">

            <form wire:submit="updateBranch">
                    <!-- Name -->
                    <div>
                        <x-input-label for="branch_name" :value="__('Branch Name')" />
                        <x-text-input wire:model="branch_name" id="branch_name" class="block mt-1 w-full" type="text" name="branch_name" required autofocus autocomplete="Branch Name" />
                        <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="branch_desc" :value="__('Description')" />
                        <x-text-input wire:model="branch_desc" id="branch_desc" class="block mt-1 w-full"  name="branch_desc" required  autocomplete="Branch Description" />
                        <x-input-error :messages="$errors->get('branch_desc')" class="mt-2" />
                    </div>

                

                    <div class="flex items-center justify-end mt-4">
                        <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                            {{ __('Already registered?') }}
                        </a> -->
                        <button id="closeModal" wire:click ="closeModal" 
                        class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                        formnovalidate
                        >

                            {{ __('Close') }}</button>
                        <x-primary-button class="ms-4" >
                            {{ __('Save Branch') }}
                        </x-primary-button>
                        
                    </div>
            </form>
        </div>    
    </div>
</div>


