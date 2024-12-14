<div>
<!-- Add POS Modal -->
<div  id="isAddPosModal" class="modal fade @if($isAddPosModal) show @else hidden @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  z-5  " data-bs-toggle="modal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isAddPosModal) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create Purchase
                </h3>
                <button type="button" wire:click="refreshTable" data-bs-dismiss="modal"  class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" >
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
        @if($isAddPosModal)
       
                <form>
                
                </form>
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
                    <button class="text-blue-400" type="button" >Create Purchase</button>
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
