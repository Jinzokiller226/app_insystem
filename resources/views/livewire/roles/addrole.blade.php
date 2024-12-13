<section>
<?php

use App\Models\Role;
use App\Models\Branch;

use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component
{
    public string $role_name = '';
    public string $role_desc = '';
    public int $is_admin = 0;
    public int $is_employee = 0;
    public $branch_id;
    public $branches;
    public $isOpen = true;

    /**
     * Handle an incoming registration request.
     */
    public function closeAddModal(){
        $this->role_name = "";
        $this->role_desc = "";
       

        $this->isOpen = false;

    }
    public function openAddModal(){
        $this->isOpen = true;
   

    }
     public function mount()
     {
         
         // Load available roles for the dropdown
         $this->branches = Branch::all();
     }
    public function register(): void
    {
        if (!$this->isOpen) {
            
            return;
        }

        $validated = $this->validate([
            'role_name' => ['required', 'string', 'max:255','unique:'.Role::class],
            'role_desc' => ['required', 'string', 'max:255'],           
            'branch_id' => ['required', 'int','max:2'],
        ]);
        $validated['is_admin'] = $this->is_admin;
        $validated['is_employee'] = $this->is_employee;
        $validated['user_id'] = auth()->user()->id;

        event(new Registered($role = Role::create($validated)));
        session()->flash('message', 'Role Added successfully!');
        $this->redirect(route('rolesmanagement', absolute: false), navigate: true);
    }
}; ?>

<form wire:submit.prevent="register">
        <!-- Name -->
        <div>
            <x-input-label for="role_name" :value="__('Role Name')" />
            <x-text-input wire:model="role_name" id="role_name" class="block mt-1 w-full" type="text" name="role_name" required autofocus autocomplete="Role name" />
            <x-input-error :messages="$errors->get('role_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="role_desc" :value="__('Description')" />
            <x-text-input wire:model="role_desc" id="role_desc" class="block mt-1 w-full"  name="role_desc" required  autocomplete="Role Description" />
            <x-input-error :messages="$errors->get('role_desc')" class="mt-2" />
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
        <div class="mt-4">
        <p class="block font-medium text-sm text-gray-700 dark:text-gray-300">Permission:</p>
            <label
            class="block font-medium text-sm text-gray-700 dark:text-gray-300" 
            >Admin:
            <input type="checkbox" wire:model="is_admin" @if($is_admin) checked 
            value = 1 @else value = 0

            @endif />
            Employee:
            <input type="checkbox"  wire:model="is_employee" @if($is_employee) checked  value = 1 @else value = 0 @endif />
            </label>
            
            
           
        </div>
        
            
       

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a> -->
            <button id="closeAddRoleModal" wire:click="closeAddModal"
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"
            formnovalidate
            >

                {{ __('Close') }}</button>
            <button wire:click="openAddModal" 
            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4" 
                >
                {{ __('Add Role') }}
            </button>
            
        </div>
    </form>


</section>


