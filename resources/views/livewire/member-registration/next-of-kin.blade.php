<div>
    <h2 class="text-2xl font-bold mb-4">Next of Kin</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="next_of_kin_name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="next_of_kin_name" wire:model="state.next_of_kin_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('state.next_of_kin_name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="next_of_kin_relationship" class="block text-sm font-medium text-gray-700">Relationship</label>
            <input type="text" id="next_of_kin_relationship" wire:model="state.next_of_kin_relationship" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('state.next_of_kin_relationship') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="next_of_kin_phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" id="next_of_kin_phone_number" wire:model="state.next_of_kin_phone_number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('state.next_of_kin_phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
