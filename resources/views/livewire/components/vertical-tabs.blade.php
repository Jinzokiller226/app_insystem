<div class="flex">
    <!-- Vertical Tabs -->
    <div class="flex ">
        <ul class="flex-column space-y space-y-4 text-sm font-medium  dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li>
                    <button 
                    
                    wire:click="$set('selectedTab', 'tab1')"
                    class="inline-flex items-center {{ $selectedTab == 'tab1' ? 'active bg-blue-700 text-white ' : 'bg-grey-700 text-black-500' }} px-4 py-3   rounded-lg  w-full dark:bg-blue-600 transition">
                    <svg class="inline-flex w-4 h-4 me-2 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                    </svg>
                    Suppliers Profile
                    </button>
            </li>
            <li>    
                <button 
                   
                    wire:click="$set('selectedTab', 'tab2')"
                    class="inline-flex items-center  {{ $selectedTab == 'tab2' ? 'active bg-blue-700 text-white ' : 'bg-grey-700 text-black-500' }} px-4 py-3   rounded-lg  w-full dark:bg-blue-600 transition">
                    <svg class="w-6 h-6 me-2 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>

                    Product Management
                    </button>
            </li>
            <li>    
                     
                    <button 
                    
                    wire:click="$set('selectedTab', 'tab3')"
                    class="inline-flex items-center  rounded-lg  {{ $selectedTab == 'tab3' ? 'active bg-blue-700 text-white' : 'bg-grey-700 text-black-500  ' }}  px-4 py-3  w-full dark:bg-blue-600 transition">
                    <svg class="w-6 h-6 me-2 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Settings
                    </button>
            </li>
        </ul>
        
       
    </div>

    <!-- Tab Content -->
    <div class=" relative overflow-x-auto  p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
        <div class="space-y-4 mx-auto  ">
        @if ($selectedTab == 'tab1')
            <h3 class="text-xl">Suppliers 
                @foreach ($user->role->branch as $role)
                <div wire:key="auth-role-{{$role->is_admin}}-{{$role->id}}">
                    @if($user->role->is_admin == 1)
                    
                    @else
                    
                    ({{$role->branch_name}})
                    
                 
                    @endif 
                </div>
                @endforeach
                </h3>
            <div class="max-w-xxl mx-auto">
               

                <livewire:SupplierController.supplier-profile-table />
                
            </div>
        </div>
       @elseif($selectedTab == 'tab2')
     
            <div class="space-y-4 mx-auto">
                <h3 class="text-xl">Products</h3>
                <div class="max-w-xxl mx-auto">
                <div wire:loading wire:target="Productcontroller.product-management-table">
                    Loading product-management-tabl...
                </div>
                <livewire:Productcontroller.product-management-table/> 
                
                </div>
                
            </div>
        
        @elseif($selectedTab == 'tab3')
            <div  class="space-y-4">
                
                <livewire:Productcontroller.product-settings-view/> 
                    
            </div>
        @endif
    </div>
   
</div>


                  