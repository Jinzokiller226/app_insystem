
<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray overflow-hidden sm:rounded-lg">
                <div class="p-6  ">
                    <livewire:Dashboardcontroller.Dashboardcharts />
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6">
                  <!-- <h1 class="text-lg font-semibold ">LIST PENDING PURCHASES</h1> -->
                  <livewire:Poscontroller.PendingPosView />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


