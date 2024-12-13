<section>
<?php

use App\Models\Category;
use App\Models\Branch;

use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component
{
    public string $category_name = '';
    public string $category_desc = '';
    public $isOpen = true;


    public $branch_id;
    public $branches;
    

    /**
     * Handle an incoming registration request.
     */

     public function mount()
     {
         
         // Load available roles for the dropdown
         $this->branches = Branch::all();
     }

     public function closeAddModal(){
        $this->category_name = "";
        $this->category_desc = "";
        $this->branch_id = 0;

        $this->isOpen = false;

     }
     public function addClicked(){
        $this->isOpen = true;
        
     }
   
    public function register(): void
    {
        if (!$this->isOpen) {
            // Don't submit the form if the modal is closed
            return;
        }

        $validated = $this->validate([
            'category_name' => ['required', 'string', 'max:255','unique:'.Category::class],
            'category_desc' => ['required', 'string', 'max:255'],           
            'branch_id' => ['required', 'int','max:2'],
        ]);
       
        $validated['user_id'] = auth()->user()->id;

        event(new Registered($category = Category::create($validated)));
        session()->flash('message', 'Category Added successfully!');
        $this->redirect(route('categorymanagement', absolute: false), navigate: true);
    }
}; ?>

<form wire:submit.prevent="register">
        <!-- Name -->
        <div>
            <x-input-label for="category_name" :value="__('Category Name')" />
            <x-text-input wire:model="category_name" id="category_name" class="block mt-1 w-full" type="text" name="category_name" required autofocus autocomplete="Category name" />
            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="category_desc" :value="__('Category Description')" />
            <x-text-input wire:model="category_desc" id="category_desc" class="block mt-1 w-full"  name="category_desc" required  autocomplete="Category Description" />
            <x-input-error :messages="$errors->get('category_desc')" class="mt-2" />
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
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a> -->
            <button id="closeAddCategoryModal" wire:click="closeAddModal" 
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
            formnovalidate
            >

                {{ __('Close') }}</button>
            <button wire:click="addClicked"
            class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
            >
                {{ __('Add Category') }}
            </button>
            
        </div>
    </form>


</section>
