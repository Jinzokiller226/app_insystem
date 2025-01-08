<div>
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

<!-- Add/Update Diagnosis -->
<div  id="UpdateDiagnosis" class="modal fade @if($UpdateDiagnosis) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($UpdateDiagnosis) fixed @else none @endif;">
    <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add/Update Diagnosis ({{$patient_fullName}})
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
        </div>
            <!-- Each <div> is a single column.
Place some content inside to see the effect. -->
        <div>
                    <h3 class=" pb-4 text-sm font-semibold text-gray-900 dark:text-white">Diagnosis</h3>
                    <div class="flex justify-between items-center pb-2 mb-2 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <form wire:submit.prevent="registerDiagnosis">  
                <h5 class="text-sm font-semibold text-gray-900 dark:text-white"> OS - Left Eye   <input id="default-checkbox" type="checkbox" wire:model.live="os_enable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </h5>
                    </div>
                   
                        @if($os_enable)
                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                            
                                <div>
                                        <label for="os_sphere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sphere</label>
                                        <input type="text" wire:model="os_sphere" id="os_sphere" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sphere" required />
                                    </div>
                                    <div>
                                        <label for="os_cylinder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cylinder</label>
                                        <input type="text" wire:model="os_cylinder" id="os_cylinder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cylinder" required />
                                    </div>
                                    <div>
                                        <label for="os_axis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Axis</label>
                                        <input type="text" wire:model="os_axis" id="os_axis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Axis" required />
                                    </div>
                                    <div>
                                        <label for="os_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add</label>
                                        <input type="text" wire:model="os_add" id="os_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add" required />
                                    </div>
                                    <div>
                                        <label for="os_va" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VA</label>
                                        <input type="text" wire:model="os_va" id="os_va" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="VA" required />
                                    </div>
                                
                            </div>
                                    
                            @endif
                    <div class="flex justify-between items-center pb-2 mb-2 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h5 class="text-sm font-semibold text-gray-900 dark:text-white"> OD - Right Eye   <input id="default-checkbox" type="checkbox" wire:model.live="od_enable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </h5>
                
                    </div>
                        @if($od_enable)
                            <div class="grid gap-6 mb-6 md:grid-cols-3 ">
                                
                                <div>
                                        <label for="od_sphere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sphere</label>
                                        <input type="text" wire:model="od_sphere" id="od_sphere" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sphere" required />
                                    </div>
                                    <div>
                                        <label for="od_cylinder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cylinder</label>
                                        <input type="text" wire:model="od_cylinder" id="od_cylinder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cylinder" required />
                                    </div>
                                    <div>
                                        <label for="od_axis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Axis</label>
                                        <input type="text" wire:model="od_axis" id="od_axis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Axis" required />
                                    </div>
                                    <div>
                                        <label for="od_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add</label>
                                        <input type="text" wire:model="od_add" id="od_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add" required />
                                    </div>
                                    <div>
                                        <label for="od_va" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VA</label>
                                        <input type="text" wire:model="od_va" id="od_va" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="VA" required />
                                    </div>
                            </div>
                            @endif
                            <div>
                                        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                                        <input type="text" wire:model="pr_notes" id="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Notes" required />
                            </div>
                            <div>
                                        <label for="pd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PD</label>
                                        <input type="text" wire:model="pr_pd" id="pd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="PD" required />
                            </div>
                            <!-- Doctor List Depends on Patient's Branch -->
                            <div class="mt-4">
                            <label for="doctor_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Doctor</label>
                                <select
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                id="doctor_id" wire:model="doctor_id" >
                                    <option value="0" >select Doctor</option>
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->doctor_fname.' '.$doctor->doctor_mname.' '.$doctor->doctor_lname }}</option>
                                    @endforeach
                                </select>
                                @error('doctor_id') <span class="error">{{ $message }}</span> @enderror
                            </div> 

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" wire:click="registerDiagnosis"
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                                >
                                Save 
                                <div wire:loading>
                                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                </div>
                            </button>
                            
                        </div>
                </form>
                
        </div>
          
    </div>

</div>
<!-- Add/Update Diagnosis -->
@if($dataFromSession > 0)

    <div  class="py-4  @if($isAddOpen== true || $isEditOpen == true || $UpdateDiagnosis == true) hidden @else @endif max-w-xxl mx-auto sm:px-6 lg:px-8 space-y-6  @if($dataFromSession > 0) animate__animated animate__fadeInLeft @endif">
            <div class="p-4 sm:p-8 bg-white dark:bg-white-800 shadow sm:rounded-lg ">
                <div class="max-w-xxl mx-auto ">
                    <h1 class="py-3 font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    Patient History ({{$patientName}})
                    </h1>
                    
                    <!-- History Data -->
                   
                    <div class="relative overflow-x-auto ">
                    @if($patientRecordCount <= 0)
                    <h1 class="font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    No Record
                    </h1>
                    @else
                                <table class="@if($isAddOpen== true || $isEditOpen == true || $UpdateDiagnosis == true) hidden @else @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Record #
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Eye Location
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Sphere
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Cylinder
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        axis
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        VA
                                                    </th>
                                                    
                                                    <th scope="col" class="px-6 py-3">
                                                        Add
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Notes
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        PD
                                                    </th>
                                                </tr>
                                    </thead>
                                    <tbody>
                                    
                            
                                        @foreach($historyData as $patient)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                             <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                               # {{$patient->id}}

                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Oculus Sinister(Left Eye)

                                            </th>
                                            @foreach($patient->oculussinisters as $osdata)
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_sphere}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_cylinder}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_axis}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_va}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$osdata->os_add}}

                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-white-50 dark:bg-gray-800">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                           

                                            </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Oculus Dexter(Right Eye)

                                            </th>
                                        @foreach($patient->oculusdexters as $oddata)
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_sphere}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_cylinder}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_axis}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_va}}

                                                </th>
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{$oddata->od_add}}

                                                </th>
                                            @endforeach
                                        </tr>
                                        <tr class="bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @foreach($patient->doctors as $doctor)
                                                    Attending Doctor: {{$doctor->doctor_fname.' '.$doctor->doctor_lname}}
                                                @endforeach
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            Date: {{ date_format($patient->created_at,"M. d,Y")}}
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$patient->pr_notes}}
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$patient->pr_pd}}
                                            </th>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                        @endif
                        </div>
                </div>
            </div>
        </div>

    @endif



    
<button type="button" wire:click="$set('isAddOpen', true)"   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-80 " >Add Patient (+)</button>
<x-text-input type="text" wire:model.live.denounce.500ms="search" placeholder="Search" class="mb-4 p-2 border rounded" />
<div class="relative overflow-x-auto @if($isAddOpen== true || $isEditOpen == true || $UpdateDiagnosis == true) hidden @else @endif ">
    <h1 class="py-4 font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Patient List') }}
    </h1>
<table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
            <button class="text-blue-400 hover:underline" type="button"  wire:click="UpdateData({{$patient->id}})">Edit  </button> |
            <button class="text-blue-400 hover:underline" type="button" wire:click="infoDiagnosis({{$patient->id}})">Update Diagnosis</button> |
            <button class="text-blue-400 hover:underline" type="button" wire:click="viewHistory({{$patient->id}})" >View History</button>
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
                <div class="@if($isAddOpen == true || $isEditOpen == true || $UpdateDiagnosis == true) hidden @endif">
                {{$data->links()}}
                </div>
            </div>
         </div>   
    </div>
   
   
 
   

</div>
<script>
  Livewire.on('componentUpdated', () => {
    // Add code to ensure that CDN assets are reloaded if necessary
    location.reload(); // force a page reload after Livewire update
  });
</script>