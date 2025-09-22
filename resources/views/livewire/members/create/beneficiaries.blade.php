<div>
    <h3 class="text-lg font-medium text-gray-900">Beneficiaries</h3>

    @foreach($beneficiaries as $index => $beneficiary)
        <div class="grid grid-cols-12 gap-6 mt-4 border-t pt-4">
            <div class="col-span-12 sm:col-span-3">
                <label for="beneficiary_name_{{ $index }}" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model.defer="beneficiaries.{{ $index }}.name" id="beneficiary_name_{{ $index }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label for="beneficiary_relationship_{{ $index }}" class="block text-sm font-medium text-gray-700">Relationship</label>
                <input type="text" wire:model.defer="beneficiaries.{{ $index }}.relationship" id="beneficiary_relationship_{{ $index }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label for="beneficiary_phone_{{ $index }}" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" wire:model.defer="beneficiaries.{{ $index }}.phone" id="beneficiary_phone_{{ $index }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-2">
                <label for="beneficiary_allocation_{{ $index }}" class="block text-sm font-medium text-gray-700">Allocation (%)</label>
                <input type="number" wire:model.defer="beneficiaries.{{ $index }}.allocation" id="beneficiary_allocation_{{ $index }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="col-span-12 sm:col-span-1 flex items-end">
                <button type="button" wire:click="removeBeneficiary({{ $index }})" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Remove
                </button>
            </div>
        </div>
    @endforeach

    <div class="mt-4">
        <button type="button" wire:click="addBeneficiary" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Add Beneficiary
        </button>
    </div>
    @error('beneficiaries') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
