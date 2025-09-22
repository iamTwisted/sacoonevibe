<div>
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-medium text-gray-900">Beneficiaries</h3>
        <button wire:click="addBeneficiary" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Beneficiary</button>
    </div>

    @foreach ($beneficiaries as $index => $beneficiary)
        <div class="border-t border-gray-200 pt-4 mt-4">
            <div class="flex justify-between items-center">
                <h4 class="text-md font-medium text-gray-900">Beneficiary {{ $index + 1 }}</h4>
                <button wire:click="removeBeneficiary({{ $index }})" class="text-red-500 hover:text-red-700">Remove</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="beneficiary_name_{{ $index }}" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" wire:model="beneficiaries.{{ $index }}.name" id="beneficiary_name_{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="beneficiary_relationship_{{ $index }}" class="block text-sm font-medium text-gray-700">Relationship</label>
                    <input type="text" wire:model="beneficiaries.{{ $index }}.relationship" id="beneficiary_relationship_{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <div>
                    <label for="beneficiary_phone_{{ $index }}" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" wire:model="beneficiaries.{{ $index }}.phone" id="beneficiary_phone_{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="beneficiary_id_number_{{ $index }}" class="block text-sm font-medium text-gray-700">ID Number</label>
                    <input type="text" wire:model="beneficiaries.{{ $index }}.id_number" id="beneficiary_id_number_{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="mt-4">
                <label for="beneficiary_allocation_{{ $index }}" class="block text-sm font-medium text-gray-700">Allocation (%)</label>
                <input type="number" wire:model="beneficiaries.{{ $index }}.allocation" id="beneficiary_allocation_{{ $index }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
        </div>
    @endforeach
</div>
