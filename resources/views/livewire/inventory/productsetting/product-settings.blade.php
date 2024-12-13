<div>

    <div class="max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-grey dark:bg-gray-800 shadow sm:rounded-lg">
        {{__('Product Settings')}}
        @if (session()->has('message'))
                        @if(session('status') == 'red')
                        <div class="p-4 mb-4 text-sm text-black-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-black-400" role="alert">
                                {{ session('message') }}
                            </div>
                        @else
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                       
         @endif
        <form wire:submit.prevent="save">
                        <div class="mt-4">
                        <x-input-label for="ps_dangerlevel" :value="__('Danger Stock Count')" />
                        <x-text-input wire:model="ps_dangerlevel" id="ps_dangerlevel" class="block mt-1 w-50" type="number" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"   name="ps_dangerlevel" required   />
                        <x-input-error :messages="$errors->get('ps_dangerlevel')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                        <x-input-label for="ps_greenlevel" :value="__('Green Stock Count')" />
                        <x-text-input wire:model="ps_greenlevel" id="ps_greenlevel" class="block mt-1 w-50" type="number" pattern="[0-9]{4}-[0-9]{3}-[0-9]{3}"   name="ps_greenlevel" required   />
                        <x-input-error :messages="$errors->get('ps_greenlevel')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-primary-button class="ms-4" >
                            {{ __('Save') }}
                        </x-primary-button>
                        </div>
                       
                    
        </form>
    </div>
    </div>
</div>
