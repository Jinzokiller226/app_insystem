<div>
                <!-- Add Patient Modal -->
                
            
            <!-- Add Patient Modal -->
            <div class="relative overflow-x-auto  ">

            <h1 class="py-4 font-bold text-center text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Completed Purchase list') }}
            </h1>
            <x-text-input type="text" wire:model.live.denounce.500ms="search"  placeholder="Search" class="mb-4 p-2 border rounded " />
                <table class=" w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>    
                                <th scope="col" class="px-6 py-3">
                                    Invoice Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Patient name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Type of Purchase
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Balance
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Products Availed
                                    </th>

                                    <!-- <th scope="col" class="px-6 py-3">
                                    Status
                                    </th> -->
                                    <th scope="col" class="px-6 py-3">
                                    Branch
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    Added By
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    Date Completed
                                    </th>
                                  
                                </tr>
                    </thead>
                    <tbody>
                
                    
                        
                                @foreach($salesData as $data)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                
                                                # {{$data->pos_invoice_id}}
                                            
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        
                                                {{$data->patient_fname.' '.$data->patient_mname.' '.$data->patient_lname}}
                                        
                                            </th>
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                @if($data->pos_typeOfPurchase == 'DP')
                                                    {{'Downpayment/Deposit(DP)'}}
                                                @else
                                                    {{'Full Payment(FP)'}}
                                                @endif
                                            </th >
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data->pos_addamount}}
                                            </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$data->pos_balance}}
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            
                                                
                                                @if($data->product1)
                                                    {{'Lens: '.$data->product1->product_name}}
                                                @endif
                                                |
                                                @if($data->product2)
                                                    {{'Frame: '.$data->product2->product_name}}
                                                @endif
                                                
                                            
                                        </th>
                                    
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @foreach($data->branches as $branch)
                                                {{$branch->branch_name}}
                                            @endforeach
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            @foreach($data->users as $user)
                                                {{$user->name}}
                                            @endforeach
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data->updated_at}}
                                        </th>
                                    </tr>
                            
                        @endforeach
                
                
                    </tbody>
                </table>
            </div>
            <div class="py-4 px-3 ">
                <div class="flex">
                    <div class="flex space-x-4 items-center mb-3">
                        <label > Per page</label>
                        <select wire:model.live.denounce:300ms="perPageCompleted"  class="rounded">
                            <option value="5">5</option>
                            <option value="20">10</option>
                            <option value="50">50</option>
                        </select>
                        <div class="">
                        {{$salesData->links()}}
                        </div>
                    </div>
                </div>   
            </div>
</div>
