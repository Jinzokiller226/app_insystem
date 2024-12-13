<div class="relative overflow-x-auto">
    <br />

    @if (session()->has('message'))
<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <table class="w-full text-sm text-center rtl:text-center text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Category Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Branch 
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
            @foreach ($categories as $category)
            <tr  class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->id}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->category_name}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->category_desc}}
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @foreach ($category->branch as $branch)
                            {{ $branch->branch_name}}
                        @endforeach
  
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @foreach ($category->users as $created)
                            {{ $created->name}}
                    @endforeach
                    
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$category->created_at}}
                    
                </th>
                <th scope="row">
                <button type="button" wire:click="delete({{$category->id}})">Delete</button> | <button type="button" wire:click="editCategory({{$category->id}})">Update</button>
                </th>
            </tr>

    
            @endforeach
           
        </tbody>
    </table>
    @livewire('categorycontroller.update-category-modal')
  
</div>

