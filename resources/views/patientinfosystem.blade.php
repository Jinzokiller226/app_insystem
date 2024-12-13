<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Patient Information System') }}
        </h2>
    </x-slot>
    
   
    <div class="py-2">
        <div class="max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg">
                <div class="max-w-xxl mx-auto">
                <h1 class="font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Patient List') }}
                </h1>
                    <livewire:Patientcontroller.PatientInfoView />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>