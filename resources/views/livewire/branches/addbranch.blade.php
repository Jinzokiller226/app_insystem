<section>
<?php

use App\Models\Branch;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component
{
    public string $branch_name = '';
    public string $branch_desc = '';
    public $isOpen = true;

    public int $branch_id = 0;
    /**
     * Handle an incoming registration request.
     */
    public function closeAddModal(){
        $this->branch_name = "";
        $this->branch_desc = "";
        

        $this->isOpen = false;

     }
     public function addBranchClicked(){
        $this->isOpen = true;
        
     }
   
    public function register(): void
    {
        if (!$this->isOpen){
            return;

        }
        $validated = $this->validate([
            'branch_name' => ['required', 'string', 'max:255','unique:'.Branch::class],
            'branch_desc' => ['required', 'string', 'max:255'],  
                     
        ]);
        $validated['user_id'] = auth()->user()->id;

        event(new Registered($role = Branch::create($validated)));
        session()->flash('message', 'Branch Added successfully!');
        $this->redirect(route('branch', absolute: false), navigate: true);
    }
}; ?>

<form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="branch_name" :value="__('Branch Name')" />
            <x-text-input wire:model="branch_name" id="branch_name" class="block mt-1 w-full" type="text" name="branch_name" required autofocus autocomplete="Branch Name" />
            <x-input-error :messages="$errors->get('branch_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="branch_desc" :value="__('Description')" />
            <x-text-input wire:model="branch_desc" id="branch_desc" class="block mt-1 w-full"  name="branch_desc" required  autocomplete="Branch Description" />
            <x-input-error :messages="$errors->get('branch_desc')" class="mt-2" />
        </div>

       

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a> -->
            <button id="closeAddBranchModal" wire:click="closeAddModal"
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
            formnovalidate
            >

                {{ __('Close') }}</button>
            <x-primary-button class="ms-4" >
                {{ __('Add Branch') }}
            </x-primary-button>
            
        </div>
    </form>


</section>


