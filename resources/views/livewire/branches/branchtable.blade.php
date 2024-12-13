<div class="relative overflow-x-auto">
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                  Branch Name
                </th>
                <th scope="col" class="px-6 py-3">
                   Branch Description
                </th>
                <th scope="col" class="px-6 py-3">
                  Created by
                </th>
                <th scope="col" class="px-6 py-3">
                    Date Created
                </th>
                
                <th scope="col" class="px-6 py-3">
                   Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($branches as $branch)
            <tr  class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$branch->id}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$branch->branch_name}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$branch->branch_desc}}
                    
                </th>
               
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   
                        @foreach ($branch->user as $created)
                            {{ $created->name}}
                        @endforeach

                   
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$branch->created_at->format('Y-m-d')}} 
                </th>
              
                <th>
                    <button type="button" wire:click="delete({{$branch->id}})">Delete</button> | <button type="button" wire:click="editBranch({{$branch->id}})">Update</button>
                </th>
            </tr>

            @empty
            <tr>
                    <td colspan="5" class="px-4 py-2 text-center">No Roles found</td>
            </tr>

            @endforelse
        </tbody>
    </table>
    @livewire('branchcontroller.update-branch-modal')
</div>