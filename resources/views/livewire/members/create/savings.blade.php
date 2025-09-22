<div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label for="monthly_contribution" class="block text-sm font-medium text-gray-700">Monthly Contribution</label>
            <input type="number" wire:model="monthly_contribution" id="monthly_contribution" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('monthly_contribution') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="retirement_age" class="block text-sm font-medium text-gray-700">Retirement Age</label>
            <input type="number" wire:model="retirement_age" id="retirement_age" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('retirement_age') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
