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
                   Role Name
                </th>
                <th scope="col" class="px-6 py-3">
                   Role Description
                </th>
                <th scope="col" class="px-6 py-3">
                  Created by
                </th>
                <th scope="col" class="px-6 py-3">
                    Admin?
                </th>
                <th scope="col" class="px-6 py-3">
                    Employee?
                </th>
                <th scope="col" class="px-6 py-3">
                    Branch
                </th>
                <th scope="col" class="px-6 py-3">
                   Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($roles as $role)
            <tr  class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$role->id}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$role->role_name}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$role->role_desc}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   
                        @foreach ($role->user as $created)
                            {{ $created->name}}
                        @endforeach

                   
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   @if($role->is_admin == 1)
                        {{"Yes"}}
                    @else
                        {{"No"}}
                    @endif
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                @if($role->is_employee == 1)
                        {{"Yes"}}
                    @else
                        {{"No"}}
                    @endif
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   
                        @foreach ($role->branch as $branch)
                            {{ $branch->branch_name}}
                        @endforeach

                   
                    
                </th>
                <th>
                    <button type="button" wire:click="delete({{$role->id}})">Delete</button> | <button type="button" wire:click="editRole({{$role->id}})">Update</button>
                </th>
            </tr>

            @empty
            <tr>
                    <td colspan="5" class="px-4 py-2 text-center">No Roles found</td>
            </tr>

            @endforelse
        </tbody>
    </table>
    @livewire('rolecontroller.update-role-modal')
</div>