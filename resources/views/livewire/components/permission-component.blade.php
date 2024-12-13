
<div>

<label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Permission:</label>
            <label
            class="block font-medium text-sm text-gray-700 dark:text-gray-300" 
            >Admin:
            <input type="checkbox" wire:click="toggleCheckbox" wire:model="is_admin" @if($isAdmin) checked 
            value = 1

            @endif />
            Employee:
            <input type="checkbox" wire:click="toggleCheckbox2" wire:model="is_employee" @if($isEmployee) checked value = 1 @endif />
            </label>
            
            
</div>
