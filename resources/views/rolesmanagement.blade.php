<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles Management') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You Are in User management") }}
                </div>
            </div>
        </div>
    </div> -->


<div class="py-12">

    <div class="max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6">
           <div class="p-4 sm:p-8 bg-grey dark:bg-gray-800 shadow sm:rounded-lg">
           <button type="button" id="openAddRoleModal"  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80" >Add Role</button>
           <div class="max-w-xxl mx-auto">
           
                        <livewire:Rolecontroller.roles-management />
                        
            </div>

        </div>
    </div>
    <div id="addRoleModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
                
            <livewire:roles.addrole />
                
            </div>
        </div>
</div>








<script>
  
</script>
</x-app-layout>
