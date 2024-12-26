<div>
<!-- Add Doctor Modal -->
<div  id="isAddDoctor" class="modal fade @if($isAddDoctor) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isAddDoctor) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add Doctor
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <form wire:submit.prevent="register">
                        <!-- Name -->
                        <div>
                            <x-input-label for="doctor_fname" :value="__('Firstname')" />
                            <x-text-input wire:model="doctor_fname" id="doctor_fname" class="block mt-1 w-full" type="text" name="doctor_fname" required autofocus autocomplete="First Name" />
                            <x-input-error :messages="$errors->get('doctor_fname')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="doctor_mname" :value="__('Middle name (optional)')" />
                            <x-text-input wire:model="doctor_mname" id="doctor_mname" class="block mt-1 w-full" type="text" name="doctor_mname" required autofocus autocomplete="Middle Name" />
                            <x-input-error :messages="$errors->get('doctor_mname')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="doctor_lname" :value="__('Firstname')" />
                            <x-text-input wire:model="doctor_lname" id="doctor_lname" class="block mt-1 w-full" type="text" name="doctor_lname" required autofocus autocomplete="Last Name" />
                            <x-input-error :messages="$errors->get('doctor_lname')" class="mt-2" />
                        </div>


                      
                        <div class="mt-4">
                            <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                                <select
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                id="branch_id" wire:model="branch_id" required>
                                    <option value="">Select Role</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                                >
                                {{ __('Add Doctor') }}
                            </button>
                            
                        </div>
                </form>

    
            
        </div>
    </div>
<!--  Add Doctor Modal -->
  <!-- Update Doctor Modal -->
<div  id="isEditDoctor" class="modal fade @if($isEditDoctor) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isEditDoctor) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit Doctor
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
                <form wire:submit.prevent="updateDoctor">
                        <!-- Name -->
                        <div>
                            <x-input-label for="doctor_fname" :value="__('Firstname')" />
                            <x-text-input wire:model="doctor_fname" id="doctor_fname" class="block mt-1 w-full" type="text" name="doctor_fname" required autofocus autocomplete="First Name" />
                            <x-input-error :messages="$errors->get('doctor_fname')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="doctor_mname" :value="__('Middle name (optional)')" />
                            <x-text-input wire:model="doctor_mname" id="doctor_mname" class="block mt-1 w-full" type="text" name="doctor_mname" required autofocus autocomplete="Middle Name" />
                            <x-input-error :messages="$errors->get('doctor_mname')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="doctor_lname" :value="__('Firstname')" />
                            <x-text-input wire:model="doctor_lname" id="doctor_lname" class="block mt-1 w-full" type="text" name="doctor_lname" required autofocus autocomplete="Last Name" />
                            <x-input-error :messages="$errors->get('doctor_lname')" class="mt-2" />
                        </div>


                      
                        <div class="mt-4">
                            <label for="branch_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Branch</label>
                                <select
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                id="branch_id" wire:model="branch_id" required>
                                    <option value="">Select Role</option>
                                    @foreach($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                                >
                                {{ __('Save') }}
                            </button>
                            
                        </div>
                </form>

    
            
        </div>
    </div>
 <!-- Update Doctor Modal -->


<button type="button" wire:click="$set('isAddDoctor', true)"   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80 " >Add Doctor (+)</button>
<x-text-input type="text" wire:model.live.denounce.500ms="search" placeholder="Search" class="mb-4 p-2 border rounded" />
<div class="relative overflow-x-auto ">
<table class="@if($isAddDoctor== true || $isEditDoctor == true ) hidden @else @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                    <th scope="col" class="px-6 py-3">
                        Patient name
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
    @if($data->count() >= 1)
        @foreach($data as $doctor)
         
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$doctor->doctor_fname." ".$doctor->doctor_lname}}
                                
                    </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @foreach($doctor->branches as $branch)
                        {{$branch->branch_name}}
                    @endforeach
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @foreach($doctor->users as $user)
                        {{$user->name}}
                    @endforeach
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <button class="text-blue-400 hover:underline" type="button" wire:click="selectedDoctor({{$doctor->id}})" >Edit  </button> |
                <button class="text-blue-400 hover:underline" type="button" wire:click="deleteDoctor({{$doctor->id}})" >Delete  </button>
                </th>
                
            </tr>
           
        @endforeach
        @else
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ __('No Data') }}
                                
                    </th>
            </tr>
            @endif
   
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
                <div class="@if($isAddDoctor == true || $isEditDoctor == true ) hidden @endif">
                {{$data->links()}}
                </div>
            </div>
         </div>   
    </div>
   
   
 
   

</div>
</div>
