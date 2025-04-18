<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Point of Sales') }}
        </h2>
    </x-slot>
    
    <div class="py-2">
        <div class="max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-grey dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xxl mx-auto">
                                
                <livewire:Poscontroller.PosView />
                   
                </div>
            </div>
        </div>
    </div>
   
</x-app-layout>
