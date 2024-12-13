<div>



    <!-- Modal -->
    <div class="modal fade @if($isOpen) show @endif fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center  " id="updateUserModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: @if($isOpen) fixed @else none @endif;">
        <div class="bg-white p-6 rounded-lg w-1/3 h-1/3">
            
                
               
                    <form wire:submit.prevent="updateUser">
                        <div class="form-group">
                            <x-input-label for="name">Name</x-input-label>
                            <x-text-input type="text" class="block mt-1 w-full" wire:model="name" id="name" required />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mt-4">
                            <x-input-label for="email">Email</x-input-label>
                            <x-text-input type="email" class="block mt-1 w-full" wire:model="email" id="email" required />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                      </div>
                      <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                            type="password"
                                            name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="role_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Permission</x-input-label>
                                <select
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" 
                                id="role_id" wire:model="role_id" required>
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        @if($role)
                                        <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role_id') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit" class="btn btn-primary">Update</x-primary-button>
                            <button type="button" 
                            class=" inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 ms-4"

                            wire:click="closeModal">Cancel</button>
                        </div>
                    </form>
                
            
        </div>  
    </div>
</div>
