<div>
    <h3 class="text-lg font-medium text-gray-900">Review</h3>
    <div class="mt-4">
        <h4 class="text-md font-medium text-gray-900">Personal Information</h4>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Branch</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $branch_id ? \App\Models\Branch::find($branch_id)->name : '' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Member Type</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $member_type }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Name</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $name }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">ID Number</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $id_number }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Phone</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $phone }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Email</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $email }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $dob }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Gender</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $gender }}</dd>
            </div>
        </dl>
    </div>

    <div class="mt-4">
        <h4 class="text-md font-medium text-gray-900">Savings</h4>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Monthly Contribution</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $monthly_contribution }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">Retirement Age</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $retirement_age }}</dd>
            </div>
        </dl>
    </div>

    <div class="mt-4">
        <h4 class="text-md font-medium text-gray-900">Shares</h4>
        <ul>
            @foreach ($selectedProducts as $productId)
                <li>{{ \App\Models\Product::find($productId)->name }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <h4 class="text-md font-medium text-gray-900">Beneficiaries</h4>
        @foreach ($beneficiaries as $beneficiary)
            <div class="border-t border-gray-200 pt-4 mt-4">
                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $beneficiary['name'] }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Relationship</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $beneficiary['relationship'] }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Phone</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $beneficiary['phone'] }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">ID Number</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $beneficiary['id_number'] }}</dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500">Allocation (%)</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $beneficiary['allocation'] }}</dd>
                    </div>
                </dl>
            </div>
        @endforeach
    </div>
</div>
