<div>
<!-- Add POS Modal -->
<div  id="isAddPosModal" class="modal fade @if($isAddPosModal) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isAddPosModal) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create Purchase: ({{$patientNameforModal}})
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        @if($isAddPosModal)
        <div class="grid grid-cols-2 gap-4">

<!-- Each <div> is a single column.
Place some content inside to see the effect. -->
                    <div>
                    <h3 class=" pb-4 text-sm font-semibold text-gray-900 dark:text-white">Diagnosis</h3>
                    <div class="flex justify-between items-center pb-2 mb-2 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        
                    <h5 class="text-sm font-semibold text-gray-900 dark:text-white"> OS - Left Eye   <input id="default-checkbox" type="checkbox" wire:model.live="pos_os_enable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </h5>
                    </div>
                   
                        @if($pos_os_enable)
                            <div class="grid gap-6 mb-6 md:grid-cols-3">
                            
                                <div>
                                        <label for="os_sphere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sphere</label>
                                        <input type="text" id="os_sphere" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sphere" required />
                                    </div>
                                    <div>
                                        <label for="os_cylinder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cylinder</label>
                                        <input type="text" id="os_cylinder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cylinder" required />
                                    </div>
                                    <div>
                                        <label for="os_axis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Axis</label>
                                        <input type="text" id="os_axis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Axis" required />
                                    </div>
                                    <div>
                                        <label for="os_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add</label>
                                        <input type="text" id="os_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add" required />
                                    </div>
                                    <div>
                                        <label for="os_va" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VA</label>
                                        <input type="text" id="os_va" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="VA" required />
                                    </div>
                                
                            </div>
                                    
                            @endif
                    <div class="flex justify-between items-center pb-2 mb-2 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h5 class="text-sm font-semibold text-gray-900 dark:text-white"> OD - Right Eye   <input id="default-checkbox" type="checkbox" wire:model.live="pos_od_enable" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </h5>
                
                    </div>
                        @if($pos_od_enable)
                            <div class="grid gap-6 mb-6 md:grid-cols-3 ">
                                
                                <div>
                                        <label for="od_sphere" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sphere</label>
                                        <input type="text" id="od_sphere" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sphere" required />
                                    </div>
                                    <div>
                                        <label for="od_cylinder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cylinder</label>
                                        <input type="text" id="od_cylinder" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cylinder" required />
                                    </div>
                                    <div>
                                        <label for="od_axis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Axis</label>
                                        <input type="text" id="od_axis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Axis" required />
                                    </div>
                                    <div>
                                        <label for="od_add" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Add</label>
                                        <input type="text" id="od_add" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add" required />
                                    </div>
                                    <div>
                                        <label for="od_va" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">VA</label>
                                        <input type="text" id="od_va" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="VA" required />
                                    </div>
                            </div>
                            @endif
                            <div>
                                        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notes</label>
                                        <input type="text" id="notes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Notes" required />
                            </div>
                            <div>
                                        <label for="pd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PD</label>
                                        <input type="text" id="pd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="PD" required />
                            </div>
                            <!-- Doctor List Depends on Patient's Branch -->
                            <div class="mb-4">
                                        <label for="doctor_list" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Doctor</label>
                                        <select id="doctor_list"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <!-- Populate Here -->
                                            <option value="FP">Full Payment</option>
                                            <option value="DP">Deposit/Down Payment</option>
                                        </select>

                                        </div>
                            
                    </div>
                <!-- DIV COls -->
                        <div class="border-l  border-stone-600">
                        <h5 class="p-2 text-sm font-semibold text-gray-900 dark:text-white">Additional Info</h5>
                                <div class="grid grid-rows-4 gap-6 mb-6 md:grid-cols-1 p-8  ">
                                    
                                        <div >
                                        <label for="pos_typeofPurchase" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Purchase</label>
                                        <select id="pos_typeofPurchase" wire:model="pos_typeofPurchase" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="FP">Full Payment</option>
                                            <option value="DP">Deposit/Down Payment</option>
                                        </select>

                                        </div>
                                        
                                        <!-- Lens List depends on Patient Branch -->
                                        <div >
                                        <label for="pos_typeofPurchase" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lens</label>
                                        <select id="pos_typeofPurchase"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="FP">Full Payment</option>
                                            <option value="DP">Deposit/Down Payment</option>
                                        </select>
                                        <!-- Frame List depends on Patient Branch -->
                                        </div>
                                        <div>
                                        <label for="pos_typeofPurchase" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frame</label>
                                        <select id="pos_typeofPurchase"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="FP">Full Payment</option>
                                            <option value="DP">Deposit/Down Payment</option>
                                        </select>

                                        </div>
                                             
                            <div class="items-center ">
                                <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                                    {{ __('Already registered?') }}
                                </a> -->
                                <button type="submit" 
                                class="w-full px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" 
                                    >
                                    {{ __('Save') }}
                                </button>
                                
                            </div>
                                </div>

                           
                        </div>

        </div>
    
        @endif


    
            
        </div>
    </div>
<!--  Add POS Modal -->

<x-text-input type="text" wire:model.live.denounce.500ms="search" placeholder="Search" class="mb-4 p-2 border rounded" />
    <div class="relative overflow-x-auto ">
        <table class="@if($isAddPosModal== true) hidden @else @endif w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                    <button class="text-blue-400" wire:click="getIDforPos({{$patient->id}})" type="button" >Create Purchase</button>
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
                <div class="@if($isAddPosModal == true) hidden @endif">
                {{$data->links()}}
                </div>
            </div>
         </div>   
    </div>
    
   
   
</div>
