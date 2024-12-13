<div>

<!--Session popup  -->


    

<!--Session popup  -->
<!-- Add Patient Modal -->
<div  id="addPatientModal" class="modal fade @if($isAddOpen) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isAddOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Patient
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        @if($isAddOpen)
       
            <form wire:submit.prevent="register">
                <div class="grid gap-4 mb-4 sm:grid-cols-3">
                    <!-- Name -->
                    <div>
                        <label for="patient_fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Firstname</label>
                        <input wire:model="patient_fname" id="patient_fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_fname" required autofocus autocomplete="Firstname" />
                        <x-input-error :messages="$errors->get('patient_fname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_mname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Middle Name</label>
                        <input wire:model="patient_mname" id="patient_mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="product_name"  autofocus autocomplete="patient_mname" />
                        <x-input-error :messages="$errors->get('patient_mname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Lastname</label>
                        <input wire:model="patient_lname" id="patient_lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_lname"  required autofocus autocomplete="patient_lname" />
                        <x-input-error :messages="$errors->get('patient_lname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Address</label>
                        <input wire:model="patient_address" id="patient_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_address"  required autofocus autocomplete="patient_address" />
                        <x-input-error :messages="$errors->get('patient_address')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Contact Number</label>
                        <input wire:model="patient_contact_number" id="patient_contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="phone" name="patient_contact_number"  required autofocus autocomplete="patient_contact_number" />
                        <x-input-error :messages="$errors->get('patient_contact_number')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Age</label>
                        <input wire:model="patient_age" id="patient_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="number" name="patient_age"  required autofocus autocomplete="patient_age" />
                        <x-input-error :messages="$errors->get('patient_age')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                    <label for="gender" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Gender</label>
                        <select name="gender"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                        wire:model="patient_gender" required
                        >
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                
                   
                    @if(auth()->user()->role->is_admin == 1)
                    <div class="mt-4">
                        <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="branch_id" wire:model="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option wire:key="branch-id-{{$branch->id}}" value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                
                
                    
                    @endif
                    
                        
                

                        <div class="flex items-center justify-end mt-4">
                              <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                                {{ __('Already registered?') }}
                            </a> -->
                            <button wire:click="$set('isAddOpen', false)" 
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                            formnovalidate
                            >

                                {{ __('Close') }}</button>
                            <button type="submit"
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                                >
                                {{ __('Add Patient') }}
                            </button>
                            
                        </div>
                    </div>
                </form>
            @endif


    
            
        </div>
    </div>
<!-- Add Patient Modal -->
<!-- Edit Patient Modal -->
<div  id="editPatientModal" class="modal fade @if($isEditOpen) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isEditOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Patient
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        @if($isEditOpen)
       
            <form wire:submit.prevent="UpdatePatient">
                <div class="grid gap-4 mb-4 sm:grid-cols-3">
                    <!-- Name -->
                    <div>
                        <label for="patient_fname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Firstname</label>
                        <input wire:model="patient_fname" id="patient_fname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_fname" required autofocus autocomplete="Firstname" />
                        <x-input-error :messages="$errors->get('patient_fname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_mname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Middle Name</label>
                        <input wire:model="patient_mname" id="patient_mname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="product_name"  autofocus autocomplete="patient_mname" />
                        <x-input-error :messages="$errors->get('patient_mname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_lname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Lastname</label>
                        <input wire:model="patient_lname" id="patient_lname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_lname"  required autofocus autocomplete="patient_lname" />
                        <x-input-error :messages="$errors->get('patient_lname')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Address</label>
                        <input wire:model="patient_address" id="patient_address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="text" name="patient_address"  required autofocus autocomplete="patient_address" />
                        <x-input-error :messages="$errors->get('patient_address')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Contact Number</label>
                        <input wire:model="patient_contact_number" id="patient_contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="phone" name="patient_contact_number"  required autofocus autocomplete="patient_contact_number" />
                        <x-input-error :messages="$errors->get('patient_contact_number')" class="mt-2" />
                    </div>
                    <div>
                        <label for="patient_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"  >Age</label>
                        <input wire:model="patient_age" id="patient_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  type="number" name="patient_age"  required autofocus autocomplete="patient_age" />
                        <x-input-error :messages="$errors->get('patient_age')" class="mt-2" />
                    </div>
                    <div class="mt-4">
                    <label for="gender" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Gender</label>
                        <select name="gender"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                        wire:model="patient_gender" required
                        >
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                    </div>
                
                   
                    @if(auth()->user()->role->is_admin == 1)
                    <div class="mt-4">
                        <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                            <select
                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                            id="branch_id" wire:model="branch_id" required>
                                <option value="">Select Branch</option>
                                @foreach($branches as $branch)
                                    <option wire:key="branch-id-{{$branch->id}}" value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                    
                    </div>
                
                
                    
                    @endif
                    
                        
                

                        <div class="flex items-center justify-end mt-4">
                              <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                                {{ __('Already registered?') }}
                            </a> -->
                            <button wire:click="refreshTable" 
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
                            formnovalidate
                            >

                                {{ __('Close') }}</button>
                            <button type="submit" wire:click="UpdatePatient"
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                                >
                                {{ __('Edit Patient') }}
                            </button>
                            
                        </div>
                    </div>
                </form>
            @endif


    
            
        </div>
    </div>
<!-- Edit Patient Modal -->

<button type="button" wire:click="$set('isAddOpen', true)"   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80 " >Add Patient (+)</button>
<x-text-input type="text" wire:model.live.denounce.500ms="search" placeholder="Search" class="mb-4 p-2 border rounded" />
<div class="relative overflow-x-auto ">
<table class="@if($isAddOpen== true || $isEditOpen == true) hidden @else @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                    <th scope="col" class="px-6 py-3">
                        Patient name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Patient Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Patient Contact
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Branch
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                       Added By
                    </th>
                   
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
    </thead>
    <tbody>
 
        @foreach($data as $patient)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$patient->patient_fname." ".$patient->patient_lname}}
                            
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{($patient->patient_address)}}
                </th >
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$patient->patient_contact_number}}
                </th>
             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @foreach($patient->branches as $branch)
                    {{$branch->branch_name}}
                @endforeach
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @foreach($patient->users as $user)
                    {{$user->name}}
                @endforeach
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            <button class="text-blue-400" type="button"  wire:click="UpdateData({{$patient->id}})">Edit</button>
            </th>
        </tr>
        @endforeach
   
    </tbody>
</table>
</div>
    <div class="py-4 px-3">
         <div class="flex">
            <div class="flex space-x-4 items-center mb-3">
                <label > Per page</label>
                <select wire:model.live.denounce:300ms="perPage"  class="rounded">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                </select>
                <div class="@if($isAddOpen == true || $isEditOpen == true) hidden @endif">
                {{$data->links()}}
                </div>
            </div>
         </div>   
    </div>
   
   
 
   

</div>
