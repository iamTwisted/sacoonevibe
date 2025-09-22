<div>
    <ul class="divide-y divide-gray-200">
        @forelse ($member->beneficiaries as $beneficiary)
            <li class="py-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-900">{{ $beneficiary->name }}</p>
                        <p class="text-sm text-gray-500">{{ $beneficiary->relationship }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-900">{{ $beneficiary->phone }}</p>
                        <p class="text-sm text-gray-500">{{ $beneficiary->id_number }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Allocation</p>
                        <p class="text-sm text-gray-500">{{ $beneficiary->allocation }}%</p>
                    </div>
                </div>
            </li>
        @empty
            <li>No beneficiaries found.</li>
        @endforelse
    </ul>
</div>
