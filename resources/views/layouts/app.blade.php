<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        
       
       
      
        @push('styles')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" >
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" >
        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        @endpush
        @vite('resources/css/app.css')
        @livewireStyles 
        
        @stack('styles')
        
        
    </head>
  
    <body class="font-sans antialiased">
   
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <livewire:layout.navigation />

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
       
      
      
        @vite(['resources/js/app.js'])
        @stack('scripts')
        @livewireScripts

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
       
       
        
    </body>
    
    <script>
        document.addEventListener('livewire:load', function () {
            
    Alpine.start();  // Ensure Alpine is started after Livewire loads
    
});
    </script>
     <!-- Toastr Script for livewire -->
     <script>
            $(document).ready(function(){
               
                toastr.options.positionClass = 'toast-top-right'
                toastr.options.progressBar = true;
            });

            window.addEventListener('success', event => {
                // toastr.success(event.detail.message);
                Swal.fire({
                    title: "Ok!",
                    text: event.detail.message,
                    icon: "success",
                    confirmButtonColor: "#3085d6",
                    timer: 2000
                });
            });
            window.addEventListener('warning', event => {
                toastr.warning(event.detail.message);

            });
            window.addEventListener('error', event => {
                toastr.error(event.detail.message);

            });
         </script>
        <!-- Connect component files js -->
    <script >


document.addEventListener('livewire:navigated', (event) => { 
           
            const addmodal = document.getElementById('addModal');
        const openAddModalBtn = document.getElementById('openAddModal');
        const closeAddModalBtn = document.getElementById('closeAddModal');
        if (addmodal == null || openAddModalBtn == null || closeAddModalBtn == null) {

        }
        else {
    openAddModalBtn.addEventListener('click', () => {
        addmodal.classList.remove('hidden');
        });
    closeAddModalBtn.addEventListener('click', () => {
        addmodal.classList.add('hidden');
            });
        }
        initFlowbite(); 
    });

    document.addEventListener('livewire:navigated', (event) => { 
           
           const addrolemodal = document.getElementById('addRoleModal');
       const openAddRoleModalBtn = document.getElementById('openAddRoleModal');
       const closeAddRoleModalBtn = document.getElementById('closeAddRoleModal');
       if (addrolemodal == null || openAddRoleModalBtn == null || closeAddRoleModalBtn == null) {

       }
       else {
        openAddRoleModalBtn.addEventListener('click', () => {
            addrolemodal.classList.remove('hidden');
       });
       closeAddRoleModalBtn.addEventListener('click', () => {
        
        addrolemodal.classList.add('hidden');
        
           });
       }
       initFlowbite(); 

   
   });

   document.addEventListener('livewire:navigated', (event) => { 
           
           const addbranchmodal = document.getElementById('addBranchModal');
       const openAddBranchModalBtn = document.getElementById('openAddBranchModal');
       const closeAddBranchModalBtn = document.getElementById('closeAddBranchModal');
       if (addbranchmodal == null || openAddBranchModalBtn == null || closeAddBranchModalBtn == null) {

       }
       else {
        openAddBranchModalBtn.addEventListener('click', () => {
            addbranchmodal.classList.remove('hidden');
       });
       closeAddBranchModalBtn.addEventListener('click', () => {
        
        addbranchmodal.classList.add('hidden');
        
           });
       }
       initFlowbite(); 

   
   });

   document.addEventListener('livewire:navigated', (event) => { 
           
           const addcategorymodal = document.getElementById('addCategoryModal');
       const openAddCategoryModalBtn = document.getElementById('openAddCategoryModal');
       const closeAddCategoryModalBtn = document.getElementById('closeAddCategoryModal');
       if (addcategorymodal == null || openAddCategoryModalBtn == null || closeAddCategoryModalBtn == null) {

       }
       else {
        openAddCategoryModalBtn.addEventListener('click', () => {
            addcategorymodal.classList.remove('hidden');
       });
       closeAddCategoryModalBtn.addEventListener('click', () => {
        
        addcategorymodal.classList.add('hidden');
        
           });
       }
       initFlowbite(); 

   
   });
  
  
   


  
        
</script>

</html>
